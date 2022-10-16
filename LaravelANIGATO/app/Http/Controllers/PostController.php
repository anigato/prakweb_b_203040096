<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // menampilkan semua post
    public function index()
    {
        return view('posts', [
            "title" => "Posts",
            "posts" => Post::all()
        ]);
    }

    // menampilkan detail post dengan parameter slug
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Singgle Post",
            "post"  => $post
        ]);
    }
}
