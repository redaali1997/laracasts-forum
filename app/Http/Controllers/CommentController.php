<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $data = $request->validate(['body' => ['required', 'string', 'max:2500']]);

        $comment = Comment::create([
            ...$data,
            'user_id' => $request->user()->id,
            'post_id' => $post->id
        ]);

        return to_route('posts.show', $post);
    }
}
