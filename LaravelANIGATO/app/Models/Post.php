<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
class Post
{
    // use HasFactory;

    private static $blog_posts = [
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

        ]
    ];

    public static function all()
    {
        // membuat array menjadi collection agar dapat dipanggil oleh banyak fungsi
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // memanggil method static all()
        $posts = static::all();

        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] == $slug) {
        //         $post = $p;
        //     }
        // }
        // return $post;

        // ambil data dari collection, gunakan fungsi firstWhere/ambil data pertama dengan kondisi
        return $posts->firstWhere('slug', $slug);
    }
}
