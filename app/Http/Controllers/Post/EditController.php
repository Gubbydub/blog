<?php

namespace App\Http\Controllers\Post;

use App\Tag;
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view(
            'post.edit',
            compact(
                'post',
                'categories',
                'tags'
            )
        );
    }
}
