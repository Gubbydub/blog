<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{
    public function index() {

// ---------------- find

        // $post = Post::find(1);       
        // dump($post->id,
        //      $post->title,
        //      $post->content,
        //      $post->like);
        // dd($post);

// ---------------- all

        // $posts = Post::all();
        // foreach($posts as $post) {
        //         // $test = $post->title;
        //         // echo $test;
        //         dump($post->title,
        //              $post->content);
        //          }

// ---------------- WHERE 
    // - get      
        // $posts = Post::where('is_published', 1)->get();
        // foreach ($posts as $post) {
        //         dump($post->title,
        //             $post->content);
        // }        
    // - first
        //  $post1 = Post::where('is_published', 0)->first();
        //  dump($post1->title);
    }

  // ---------------- create
      
  public function create() {

        $postArr = [
            [
                'title' => 'Test created post',
                'content' => 'Test created text content',
                'image' => 'image test/link',
                'like' => 51,
                'is_published' => 1,
            ],
            [
                'title' => 'Test created post',
                'content' => 'Test created text content',
                'image' => 'image test/link',
                'like' => 51,
                'is_published' => 1,
            ],
        ];

        foreach($postArr as $item){
            Post::create($item);
        }
        dd( 'created');
    // ---------test create post
        // Post::create(
        //     [
        //         'title' => 'Test created post',
        //         'content' => 'Test created text content',
        //         'image' => 'image test/link',
        //         'like' => 51,
        //         'is_published' => 1,
        //     ]);
        //     dd( 'created');
        
  }

  
}