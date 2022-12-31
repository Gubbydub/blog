<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::find(1);
        dump($post->id,
             $post->title,
             $post->content,
             $post->like);
        
    }
}
