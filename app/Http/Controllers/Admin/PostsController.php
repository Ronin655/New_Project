<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id');

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'date' => ['required'],
            'image' => ['nullable', 'image'],
        ]);

        $post = Post::add($data);
        $post->uploadImage($request->file('image'));
        $post->setCategory($request->get('category_id'));
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));
        $post->setPublic();

        return redirect()->route('posts.index');


    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}