<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $this->postService->update($request->validated(), $post);
        return redirect()->route('admin.post.show', $post->id);
    }
}
