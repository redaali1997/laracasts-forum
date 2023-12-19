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
        $posts = Post::with(['user'])->paginate();

        return Inertia::render('Posts/Index', ['posts' => PostResource::collection($posts)]);
    }
}
