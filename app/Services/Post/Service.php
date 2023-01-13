<?php

namespace App\Services\Post;

use App\Http\Controllers\Controller;
use App\Post;

class Service

{
    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);

        $post = Post::create($data)
            ->tags()
            ->attach($tags, [
                'created_at' => new \DateTime('now'),
                'updated_at' => new \DateTime('now')
            ]);

    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);

        $post->update($data);
        $post->tags()->sync($tags);
    }
}
