<?php

namespace App\Http\Controllers\Admin\Post;

use App\Tag;
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view(
            'admin.post.edit',
            compact(
                'post',
                'categories',
                'tags'
            )
        );
    }
}
