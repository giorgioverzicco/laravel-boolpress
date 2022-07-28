<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::with('posts')->get();
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->with(['posts'])
            ->first();

        return $category ?? response([
            'message' => "The category with slug {$slug} does not exists."
        ], 404);
    }
}
