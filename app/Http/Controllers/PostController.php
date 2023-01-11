<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\PostTag;
use App\Tag;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));

        // ---------------- Тестовая проверка связей многие к многим --------------
        // $post = Post::find(1);
        // dd($post->tags);
        // $tag = Tag::find(1);
        // dd($tag->posts);

        // ---------------- Тестовая проверка связей 1 к многим --------------
        // $category = Category::find(1);
        // dd($category->title);
        // dd($category->posts); // если hasMany прописан в модели Category

        // $posts = Post::where('category_id', $category->id)->get();
        // dd($posts);



        // $posts = Post::all();
        // dd($posts);
        // $categories = Category::all();
        // dd($categories); 
    }

    // ---------------- CRUD create ----------------

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
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
            'title' => 'required|string',
            'content' => 'string',
            'category_id' => '',
            'tags' => 'required',
            'like' => 'integer',
        ]);


        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);

        //Второй способ добавления поста с несколькими тегами - Праввильный
        $post = Post::create($data)
            ->tags()
            ->attach($tags, [
                'created_at' => new \DateTime('now'),
                'updated_at' => new \DateTime('now')
            ]);

        //Первый способ добавления поста с несколькими тегами
        // $post = Post::create($data);
        // foreach ($tags as $tag) {
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id,
        //     ]);
        // }

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

    // ---------------- CRUD update ----------------
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'category_id' => '',
            'tags' => 'required',
            'like' => 'integer',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        // dd($tags, $data);

        $post->update($data);
        $post->tags()->sync($tags);

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
            'like' => 667,
            'is_published' => 0,
        ]);
        dd('test');
    }
}
