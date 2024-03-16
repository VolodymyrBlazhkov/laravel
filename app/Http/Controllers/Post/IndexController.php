<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        //$posts = Post::where('is_published', 1)->first();
        //$posts = Post::paginate(2);

        $data = $request->validated();
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(2);
        return view('post.index', ['posts' => $posts]);
    }
}
