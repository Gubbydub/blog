<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 20)->create();
        $tags = factory(App\Tag::class, 50)->create();
        $posts = factory(App\Post::class, 100)->create();

        foreach ($posts as $post)
        {
            $tagsIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }
    }
}
