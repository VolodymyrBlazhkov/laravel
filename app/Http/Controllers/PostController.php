<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPosts()
    {
        $data = [
            [
                'title' => 'dsfsdfs',
                'content' => 'sdfsdfsdfsdfsdf',
                'image' => 'sdfsdfsdf',
                'likes' => 222,
                'is_published' => 1
            ],
            [
                'title' => 'dsfswerwerwerwerdfs',
                'content' => 'sdfsdfwerwerwsdfsdfsdf',
                'image' => 'sdfsdfwrewersdf',
                'likes' => 22,
                'is_published' => 1
            ],
        ];
        foreach ($data as $post) {
            Post::create($post);
        }
    }

    public function updatePosts()
    {
        $post = Post::find(1);
        $post->update(
            [
                'title' => '1111',
                'content' => '1111',
                'image' => '111',
                'likes' => 100,
                'is_published' => 1
            ],
        );
    }

    public function deletePosts()
    {
        $post = Post::find(4);
        $post->delete();
    }

    public function restorePosts()
    {
        $post = Post::withTrashed()->find(4);
        $post->restore();
    }

    public function fisrtOrCreate()
    {
        $data= [
            'title' => 'dsfssdfsdfsdfssddfs',
            'content' => 'sdfsdf',
            'image' => 'sdfsdfsdf',
            'likes' => 222,
            'is_published' => 1
        ];

        $post = Post::firstorCreate(['title' => 'dsfsdfs'], $data);
    }


    public function updateOrCreate()
    {
        $data= [
            'title' => 'dsfssdfsdfsdfs',
            'content' => 'sdfsdfsdfsdfsdf',
            'image' => 'sdfsdfsdf',
            'likes' => 222,
            'is_published' => 1
        ];

        $post = Post::updateOrCreate(['title' => 'dsfssdfsdfsdfdsdfsddfs'], $data);
    }
}
