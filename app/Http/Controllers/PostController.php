<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    // Index Route Callback
    public function index() {
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    // Show Route Callback
    public function show(Post $post) {
        // Using The Route Model Binding (Search In Documentation)
        return view('posts.show', ['post' => $post]);
    }

    // Create Route Callback
    public function create() {
        $usersDB = User::all();
        return view('posts.create', ['users' => $usersDB]);
    }

    // Store Route Callback
    public function store() {
        // Form Validation
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);
        // Request Form Data
        $title = request()->title;
        $description = request()->description;
        $creator = request()-> post_creator;
        // Insert Into DB
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $creator
        ]);

        // Redirect To Index Page
        return to_route('posts.index');
    }

    // Edit Route Callback
    public function edit(Post $post) {
        // $postsFromDB = Post::find($postId);
        $usersDB = User::all();
        return view('posts.edit', ['post' => $post, 'users' => $usersDB]);
    }

    // Update Route Callback
    public function update($postId) {
        // Form Validation
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);
        // Request Updated Data
        $title = request()->title;
        $description = request()->description;
        $creator = request()->post_creator;
        // Update Post Data
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $creator
        ]);
        // Redirect To Post Page
        return to_route('posts.show', $postId);
    }

    // Delete Route Callback
    public function destroy(Post $post) {
        $post->delete();
    return to_route('posts.index');
    }
}

