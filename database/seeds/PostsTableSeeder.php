<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Post::truncate();
        Post::unguard();

        $faker = \Faker\Factory::create();

        User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                Post::create([
                    'author_id' => $user->id,
                    'title'   => $faker->sentence,
                    'content' => $faker->sentence,
                ]);
            }
        });
    }
}
