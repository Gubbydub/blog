<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);

        $post = Post::create($data)
            ->tags()
            ->attach($tags, [
                'created_at' => new \DateTime('now'),
                'updated_at' => new \DateTime('now')
            ]);

        return redirect()->route('post.index');
    }
}
