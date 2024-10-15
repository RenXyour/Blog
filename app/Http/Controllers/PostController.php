<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }


    public function create()
    {
        $categories = Category::all();
        $authors = Author::all(); // Ambil semua data author
        return view('posts.create', compact('categories', 'authors'));
    }


    // app/Http/Controllers/PostController.php

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id', // Tambahkan validasi untuk author_id
        ]);

        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
            }

            Post::create([
                'title' => $request->title,
                'content' => $request->input('content'),
                'image' => $imagePath,
                'is_published' => $request->is_published ?? false,
                'category_id' => $request->category_id,
                'author_id' => $request->author_id // Simpan author_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post created successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }



    public function edit(Post $post)
    {
        $categories = Category::all();
        $authors = Author::all(); // Ambil semua data author
        return view('posts.edit', compact('post', 'categories', 'authors'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'is_published' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('asset-images', 'public');
                $post->update([
                    'image' => $imagePath
                ]);
            }

            $post->update([
                'title' => $request->title,
                'content' => $request->input('content'),
                'is_published' => $request->is_published ?? false,
                'category_id' => $request->category_id
            ]);

            return redirect()->route('posts.index')->with('success', 'Post updated successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }


    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        } catch (\Exception $err) {
            return redirect()->route('posts.index')->with('error', $err->getMessage());
        }
    }
}