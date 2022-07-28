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
        return $posts;
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                    ->with(['category', 'tags', 'user'])
                    ->first();
        return $post ?? response([
            'message' => "The post with slug {$slug} does not exists."
        ], 404);;
    }
}
