<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'article-1-title',
                'title' => 'Atricle 1 Title',
                'author' => 'Muhammad Abhyasa Santoso',
                'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Obcaecati porro placeat quaerat labore, quisquam dignissimos, 
                numquam dolorem laborum aut ullam quibusdam magni molestias et. 
                Fuga veritatis nam provident. Eius, cupiditate.'
            ],
            [
                'id' => 2,
                'slug' => 'article-2-title',
                'title' => 'Atricle 2 Title',
                'author' => 'Muhammad Abhyasa Santoso',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Repellat, dolore, velit pariatur delectus omnis eius hic voluptatibus ab quisquam doloribus exercitationem. 
                Eaque accusantium facilis recusandae veritatis, atque adipisci delectus illo.'
            ]
            ];
    }

    public static function find($slug): array //When error, specifies that returns value mus be an array
    {
        // return Arr::first(static::all(), function($post) use ($slug)
        // {
        //    return $post['slug'] == $slug;
        //});

        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug); //using arrow function

        if(! $post)
        {
            abort(404); // Shows error when web link doesn't exists
        }

        return $post;
    }
}