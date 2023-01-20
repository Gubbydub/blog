<?php

namespace App\Http\Controllers\Admin\Post;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {

        
        $data = $request->validated();
        // dd($data);
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(10);
        
        
   return view('admin.post.index', compact('posts'));

        

        // $posts = Post::paginate(10);
        // return view('post.index', compact('posts'));
    }
}
