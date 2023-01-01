<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{

    public function index()
    {
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
        dd('method index');
    }

    // ---------------- create ----------------

    public function create()
    {
        //     $postArr = [
        //         [
        //             'title' => 'Test created post',
        //             'content' => 'Test created text content',
        //             'image' => 'image test/link',
        //             'like' => 51,
        //             'is_published' => 1,
        //         ],
        //         [
        //             'title' => 'Test created post',
        //             'content' => 'Test created text content',
        //             'image' => 'image test/link',
        //             'like' => 51,
        //             'is_published' => 1,
        //         ],
        //     ];

        //     foreach($postArr as $item){
        //         Post::create($item);
        //     }
        //     dd( 'created');
        // // ---------test create post
        Post::create(
            [
                'title' => 'Test created post',
                'content' => 'Test created text content',
                'image' => 'image test/link',
                'like' => 51,
                'is_published' => 1,
            ]
        );
        dd('created');
    }
    // ---------------- update ----------------

    public function update()
    {
        $post = Post::find(9);
        $post->update([
            'title' => 'update 2',
            'content' => 'upadate 2',
            'image' => 'upadate 2',
            'like' => 70,
            'is_published' => 0,
        ]);
        dump('updatet');

        //---my version----
        // $post = Post::find(5)->update([
        //     'title' => 'update',
        //     'content' => 'update',
        // ]);
        // dump('updatet');

    }
    // ---------------- delete ----------------
    public function delete()
    {
        // $post = Post::find(3);

        // if ($post == false) {
        //     dd('id 5 not found');
        // } else {
        //     $post->delete();
        // }
        // dd('deleted');

        // //---my version----
        // $post = Post::find(5)->delete();
        // dd('deleted');

        //восстановление после мягкого удаления - SoftDeletes
        $post = Post::withTrashed()->find(3);
        $post->restore();
    }
    // ---------------- firstOrCreate ----------------
    //если нашел - не вносит изменения, если не нашел - создаст новую
    public function firstOrCreate() 
    {
        $post = Post::firstOrCreate([
            'title' => 'Test created post 10',
        ], [
            'content' => 'Test created text content 11',
            'image' => 'upadate 2',
            'like' => 70,
            'is_published' => 0,
        ]);
        dd('test');
    }
    // ---------------- updateOrCreate ----------------
    //если нашел - вносит изменения, если не нашел - создаст новую
    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'title' => 'Test created post 9',
        ], [
            'content' => 'Test created post 9',
            'image' => 'upadate 9',
            'like' => 60,
            'is_published' => 0,
        ]);
        dd('test');
    }
}

