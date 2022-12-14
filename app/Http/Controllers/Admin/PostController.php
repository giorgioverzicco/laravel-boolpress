<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $validation = [
        'title' => 'required|max:255',
        'category_id' => 'nullable|integer|exists:categories,id',
        'content' => 'required',
        'tags' => 'nullable|exists:tags,id',
        'published' => 'sometimes|accepted',
        'image' => 'nullable|sometimes|image|max:500'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.posts.create', [
            "categories" => Category::all(),
            "tags" => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();
        $data['published'] = isset($data['published']);

        $post = new Post();
        $post->fill($data);
        $post->user_id = Auth::id();

        if (isset($data['image'])) {
            $post->image = Storage::put('uploads', $data['image']);
        }
        
        $post->save();

        if (isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $postTags = $post->tags->map(function ($tag) {
            return $tag->id;
        })->toArray();

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'postTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validation);

        $data = $request->all();
        $data['published'] = isset($data['published']);

        if (isset($data['image'])) {
            if ($post->image) {
                Storage::delete($post->image);
            }

            $data['image'] = Storage::put('uploads', $data['image']);
        }

        $post->update($data);

        $post->tags()->sync($data['tags'] ?? []);

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
