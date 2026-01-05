<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {

            $user->profile()->create(Profile::factory()->make()->toArray());

            $user->posts()->createMany(Post::factory(2)->make()->toArray());

            foreach ($user->posts as $post) {
                $post->comments()->createMany(
                    Comment::factory(2)->make(['user_id' => $user->id])->toArray()
                );
            }

            $randomPosts = Post::inRandomOrder()->take(2)->pluck('id');
            $user->likedPosts()->attach($randomPosts);
        });
    }
}
