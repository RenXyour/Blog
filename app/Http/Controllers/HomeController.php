<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua post yang dipublikasikan
        $posts = Post::where('is_published', true)->get();

        // Mengembalikan view home dengan data post
        return view('home', compact('posts'));
    }
}
