<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function store(Request $request)
    {
        try {  
            // Validate incoming post form data with Laravel validation rules
            $incomingFields = $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);
        } catch (ValidationException $e) {
            // Return error message if validation fails
            return redirect()->name('post_page')->withErrors([
                'validation' => 'Please fill in all required fields'
            ]);
        }

        // Set the user_id to the currently authenticated user's ID
        $incomingFields['user_id'] = auth()->id();

        // Create a new post record in the database with the validated fields
        Post::create($incomingFields);

        return redirect()->route('home');
    }

    public function edit(Post $post)
    {
        return view('edit_post', ['post' => $post]);
    }

    public function create()
    {
        return view('create_post');
    }

    public function update(Post $post, Request $request)
    {
        // Check if the currently authenticated user is the owner of the post
        if (auth()->user()->id !== $post['user_id']) {
            return redirect()->route('home');
        }

        try {
            // Validate incoming post form data with Laravel validation rules
            $incomingFields = $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);
        } catch (ValidationException $e) {
            // Return error message if validation fails
            return redirect('/edit-post/'.$post->id)->withErrors([
                'validation' => 'Please fill in all required fields'
            ]);
        }

        $post->update($incomingFields);

        return redirect()->route('home');
    }

    public function delete(Post $post)
    {
        // Check if the currently authenticated user is the owner of the post
        if (auth()->user()->id === $post['user_id']) {
            // Delete the post from the database
            $post->delete();
        }

        return redirect()->route('home');
    }
}
