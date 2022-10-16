<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// routing ke home
Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

// routing ke about
Route::get('/about', function () {
    // Mengirimkan data ke view
    return view('about', [
        "title" => "About",
        "name"  => "Khoerul Anam",
        "email" => "203040096@mail.unpas.ac.id",
        "image" => "me.png"
    ]);
});


// routing ke blog
Route::get('/posts', [PostController::class, 'index']);

//route ke posting blog 
// parameter hanya ditulis pada url, tidak harus ditulis dengan parameter pada method
Route::get('posts/{post:slug}', [PostController::class,'show']);
