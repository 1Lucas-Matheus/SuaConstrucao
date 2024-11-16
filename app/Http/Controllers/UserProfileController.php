<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function index($id, $category)
    {
        $Users = User::all();
        $page = "Perfil";
        return view('profile',
        [
            'Users' => $Users,
            'id' => $id,
            'category' => $category,
            'page' => $page
        ]);
    }

    public function destroy($id)
    {
        User::findorFail($id)->delete();
        return redirect('/dashboard')->with('message', 'Usuario excluido com sucesso');
    }
    
}
