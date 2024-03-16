<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $this->postService->store($request->validated());
        return redirect()->route('post.index');
    }
}
