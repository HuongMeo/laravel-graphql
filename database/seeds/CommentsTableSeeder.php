<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Comment::truncate();
        Comment::unguard();

        $faker = \Faker\Factory::create();

        Post::all()->each(function ($post) use ($faker) {
            foreach (range(1, 3) as $i) {
                Comment::create([
                    'post_id' => $post->id,
                    'reply'   => $faker->sentence,
                ]);
            }
        });
    }
}
