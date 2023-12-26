<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->latest()->latest('id')->paginate();

        return Inertia::render('Posts/Index', [
            'posts' => PostResource::collection($posts)
        ]);
    }

    public function show(Post $post)
    {
        $post->load('user');
        
        return Inertia::render('Posts/Show', [
            'post' => PostResource::make($post)
        ]);
    }
}
