<?php

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
    return view('home');
});

// routing ke about
Route::get('/about', function () {
    // Mengirimkan data ke view
    return view('about',[
        "name" => "Khoerul Anam",
        "email" => "203040096@mail.unpas.ac.id",
        "image" => "me.png"
    ]);
});

// routing ke blog
Route::get('/blog', function () {
    return view('posts');
});
