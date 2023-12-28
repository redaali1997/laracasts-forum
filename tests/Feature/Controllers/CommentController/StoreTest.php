<?php

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('can store a comment', function () {
    $user = User::factory()->create();

    $post = Post::factory()->create();

    actingAs($user)
        ->post(route('posts.comments.store', $post), [
            'body' => 'This is comment.'
        ]);

    $this->assertDatabaseHas(Comment::class, [
        'body' => 'This is comment.',
        'user_id' => $user->id,
        'post_id' => $post->id
    ]);
});

it('redirects to the post show page', function () {
    $post = Post::factory()->create();

    actingAs(User::factory()->create())
        ->post(route('posts.comments.store', $post), [
            'body' => 'This is comment.'
        ])
        ->assertRedirect(route('posts.show', $post));
});

it('passes a valid body', function ($value) {
    $post = Post::factory()->create();

    actingAs(User::factory()->create())
        ->post(route('posts.comments.store', $post), [
            'body' => $value
        ])
        ->assertInvalid(['body']);
})->with([null, 1, 1.5, true, str_repeat('a', 2501)]);
