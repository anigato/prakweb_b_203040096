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
Route::get('/blog', function () {
    $blog_posts = [
        [
            "title"  => "Hari Pertama",
            "slug"   => "judul-hari-pertama",
            "author" => "Anigato",
            "body"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, excepturi debitis et atque aut odio consequatur recusandae quo unde laborum magni sequi omnis voluptates tempore ipsum tenetur reprehenderit placeat vel aperiam animi? Magnam cupiditate, voluptate quis sapiente cumque earum similique reprehenderit distinctio iusto, quam suscipit recusandae possimus facere deleniti odit perferendis delectus temporibus at explicabo beatae dolor ipsa eligendi? Dolores exercitationem repellat autem? Modi debitis voluptatum impedit molestias, enim commodi labore dolor in maiores? Dolorem, placeat eum voluptatum doloremque nostrum doloribus voluptas repellendus neque officia exercitationem delectus sapiente itaque consequuntur ut vitae, eligendi deserunt nulla! Voluptas error aspernatur quasi! Minima."

        ],
        [
            "title"  => "Hari Kedua",
            "slug"   => "judul-hari-kedua",
            "author" => "Khoerul",
            "body"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, excepturi debitis et atque aut odio consequatur recusandae quo unde laborum magni sequi omnis voluptates tempore ipsum tenetur reprehenderit placeat vel aperiam animi? Magnam cupiditate, voluptate quis sapiente cumque earum similique reprehenderit distinctio iusto, quam suscipit recusandae possimus."

        ],
    ];

    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});

//route ke posting blog 
Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title"  => "Hari Pertama",
            "slug"   => "judul-hari-pertama",
            "author" => "Anigato",
            "body"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, excepturi debitis et atque aut odio consequatur recusandae quo unde laborum magni sequi omnis voluptates tempore ipsum tenetur reprehenderit placeat vel aperiam animi? Magnam cupiditate, voluptate quis sapiente cumque earum similique reprehenderit distinctio iusto, quam suscipit recusandae possimus facere deleniti odit perferendis delectus temporibus at explicabo beatae dolor ipsa eligendi? Dolores exercitationem repellat autem? Modi debitis voluptatum impedit molestias, enim commodi labore dolor in maiores? Dolorem, placeat eum voluptatum doloremque nostrum doloribus voluptas repellendus neque officia exercitationem delectus sapiente itaque consequuntur ut vitae, eligendi deserunt nulla! Voluptas error aspernatur quasi! Minima."

        ],
        [
            "title"  => "Hari Kedua",
            "slug"   => "judul-hari-kedua",
            "author" => "Khoerul",
            "body"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, excepturi debitis et atque aut odio consequatur recusandae quo unde laborum magni sequi omnis voluptates tempore ipsum tenetur reprehenderit placeat vel aperiam animi? Magnam cupiditate, voluptate quis sapiente cumque earum similique reprehenderit distinctio iusto, quam suscipit recusandae possimus."

        ],
    ];

    foreach ($blog_posts as $post) {
        if ($post["slug"] == $slug) {
            $new_post = $post;
        }
    }
    return view('post', [
        "title" => "Singgle Post",
        "post"  => $new_post
    ]);
});
