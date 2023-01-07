<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();        
        return view('post.index', compact('posts'));
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

        // dd('method index');
    }

    // ---------------- CRUD create ----------------

    public function create()
    {
        return view('post.create');
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
        // Post::create(
        //     [
        //         'title' => 'Test created post',
        //         'content' => 'Test created text content',
        //         'image' => 'image test/link',
        //         'like' => 51,
        //         'is_published' => 1,
        //     ]
        // );
        // dd('created');
    }
    // ---------------- CRUD store ----------------
    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'like' => 'integer',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }
    // ---------------- CRUD show ----------------
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
    // ---------------- CRUD edit ----------------
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    // ---------------- CRUD update ----------------
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'like' => 'integer',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    // ----------------  update ----------------
    // public function update()
    // {
    //     // $post = Post::find(4);
    //     // $post->update([
    //     //     'title' => 'update 2',
    //     //     'content' => 'upadate 2',
    //     //     'image' => 'upadate 2',
    //     //     'like' => 70,
    //     //     'is_published' => 0,
    //     // ]);
    //     // dump('updatet');

    //     //---my version----
    //     // $post = Post::find(5)->update([
    //     //     'title' => 'update',
    //     //     'content' => 'update',
    //     // ]);
    //     // dump('updatet');

    // }

    // ---------------- CRUD destroy / delete ----------------
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    // ---------------- delete ----------------
    // public function delete()
    // {
    //     // $post = Post::find(3);

    //     // if ($post == false) {
    //     //     dd('id 5 not found');
    //     // } else {
    //     //     $post->delete();
    //     // }
    //     // dd('deleted');

    //     // //---my version----
    //     // $post = Post::find(5)->delete();
    //     // dd('deleted');

    //     //восстановление после мягкого удаления - SoftDeletes
    //     $post = Post::withTrashed()->find(3);
    //     $post->restore();
    // }
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
            'like' => 667,
            'is_published' => 0,
        ]);
        dd('test');
    }
}
