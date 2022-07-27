<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)
                    ->with(['category', 'tags', 'user'])
                    ->get();
        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->with(['category', 'tags', 'user'])
                    ->first();
        return response()->json($post);
    }
}
