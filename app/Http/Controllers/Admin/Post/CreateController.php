<?php

namespace App\Http\Controllers\Admin\Post;

use App\Post;
use App\Tag;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class CreateController extends BaseController
{
    public function __invoke()
    {
        
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }
}
