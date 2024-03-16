<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);

            $post = Post::create($data);
            $post->tags()->attach($tags);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return $post;
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            $tags = $data['tags'];
            unset($data['tags']);

            $post->update($data);
            $post->tags()->sync($tags);
            $post->frash();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return $post;
    }
}
