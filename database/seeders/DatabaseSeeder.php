<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $posts = Post::factory(100)->recycle($users)->create();

        $comments = Comment::factory(1000)->recycle($posts)->recycle($users)->create();

        $reda = User::factory()
            ->has(Post::factory(50))
            ->has(Comment::factory(100)->recycle($posts))
            ->create([
                'name' => 'Reda Ali',
                'email' => 'test@example.com',
            ]);
    }
}
