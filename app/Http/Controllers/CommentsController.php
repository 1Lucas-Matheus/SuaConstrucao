<?php

namespace App\Http\Controllers;

use App\Models\Avaliations;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create($id)
    {   
        $UserCommented = User::findorfail($id);
        $UserSession = Auth::user();
        $Comments = comments::all();
        $AvaliationsType = Avaliations::all();
        $page = "Adicionar Comentario";
        return view('CreateComment', [
            'UserSession' => $UserSession,
            'UserCommented' => $UserCommented,
            'Comments' => $Comments,
            'AvaliationsType' => $AvaliationsType,
            'page' => $page
        ]);
    }

    public function store(Request $request)
    {

        $comments = new comments();
        $comments->idUserComentou = $request->idUserComentou;
        $comments->idUserComentado = $request->idUserComentado;
        $comments->comment = $request->comment;
        $comments->avaliationId = $request->avaliationId;

        $comments->save();

        return redirect('/categories')->with('message', 'Categoria criada com sucesso');
    }

    public function edit($id)
    {
        $category = comments::findOrFail($id);
        $categories = comments::All();
        $page = "Atualizar Categoria";

        return view(
            'updateCategory',
            [
                'category' => $category,
                'categories' => $categories,
                'page' => $page
            ]);
    }

    public function update(Request $request, $id)
    {
        $category = comments::findOrFail($id);
        $categories = comments::All();
        $page = "Categorias";
        $category->Name = $request->Name;
        $category->id = $request->id;
        $category->updated_at = now();
        $category->save();

        return view('/categories',
        [
            'categories' => $categories,
            'page' => $page
        ])->with('message', 'Usuário atualizado com sucesso!');
    }


    public function destroy($id)
    {
        comments::findorFail($id)->delete();
        return redirect('/categories')->with('message', 'Categoria excluido com sucesso');
    }
}
