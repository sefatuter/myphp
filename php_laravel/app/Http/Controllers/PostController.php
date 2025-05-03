<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

// php artisan make:controller PostController
class PostController extends Controller
{
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        // ✅ Validate input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:5'
        ]);

        // ✅ Save to DB
        Post::create($validated);

        return 'Post created successfully!';
    }
}
