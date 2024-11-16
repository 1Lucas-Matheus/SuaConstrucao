<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class preDashboard extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $Users = User::all();
        $UserId = Auth::user();
        $page = "Dashboard";
        
        $usersJoin = User::select('users.categoryId', 'categories.Name')
            ->join('categories', 'users.categoryId', '=', 'categories.id')
            ->get();

        return view('dashboard', [
            'Users' => $Users,
            'UserId' => $UserId,
            'usersJoin' => $usersJoin,
            'search' => $search,
            'page' => $page
        ]);
    }
}
