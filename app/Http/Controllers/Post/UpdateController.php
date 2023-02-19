<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Post;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        
        $data = $request->validated();
        $this->service->update($post, $data);
        // dd($data);
        

        return redirect()->route('post.show', $post->id);
    }
}
