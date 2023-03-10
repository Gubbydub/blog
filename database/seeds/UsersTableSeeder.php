<?php

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 50)->create()->each(function ($user) {
        //     $user->posts()->save(factory(App\Post::class)->make());
        // });

        factory(App\User::class, 76)->create();
    }
}
