<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $posts = $query->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'image_url' => 'nullable|string',
            'author' => 'required|string|max:255',
        ]);

        $image = 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $filename);
            $image = 'uploads/blog/' . $filename;
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image' => $image,
            'author' => $request->author,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:4096',
            'image_url' => 'nullable|string',
            'author' => 'required|string|max:255',
        ]);

        $image = $post->image;

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'blog_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $filename);
            $image = 'uploads/blog/' . $filename;
        } elseif (!empty($request->image_url)) {
            $image = $request->image_url;
        }

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . $post->id,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image' => $image,
            'author' => $request->author,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Blog post deleted successfully!');
    }
}
