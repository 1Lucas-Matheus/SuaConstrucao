<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\preDashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Models\category;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', function (Request $request) {

        $search = $request->query('search');
        $Users = User::all();
        $UserId = FacadesAuth::user();
        $page = "Dashboard";
        return view('dashboard', [
            'Users' => $Users,
            'UserId' => $UserId,
            'search' => $search,
            'page' => $page
        ]);

});

Route::get('/categories', function (Request $request) {

    $search = $request->query('search');
    $categories = category::all();
    $UserId = FacadesAuth::user();
    $page = "Categorias";
    return view('categories', [
        'categories' => $categories,
        'UserId' => $UserId,
        'search' => $search,
        'page' => $page
    ]);

});

Route::get('/dashboard', [preDashboard::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/profile/{id}/{categoryId}', [UserProfileController::class, 'index']);
Route::get('/destroy/{id}', [UserProfileController::class, 'destroy']);

Route::get('/clients', [ClientsController::class, 'clients'])->middleware(['auth', 'verified']);
Route::put('/edit/{id}', [ClientsController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/update/{id}', [ClientsController::class, 'update'])->middleware(['auth', 'verified']);

Route::get('/createCategory', [CategoryController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/store', [CategoryController::class, 'store'])->middleware(['auth', 'verified']);
Route::put('/cu/{id}', [CategoryController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/updateCategory/{id}', [CategoryController::class, 'update'])->middleware(['auth', 'verified']);
Route::get('/destroyCategory/{id}', [CategoryController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/comment/{id}', [CommentsController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/storeComment', [CommentsController::class, 'store'])->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
