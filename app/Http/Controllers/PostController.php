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
            $incomingFields = $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);
        } catch (ValidationException $e) {
            return redirect('/create-post')->withErrors([
                'validation' => 'Please fill in all required fields'
            ]);
        }

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $incomingFields['user_id'] = auth()->id();

        Post::create($incomingFields);

        return redirect('/');
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
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        try {
            $incomingFields = $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);
        } catch (ValidationException $e) {
            return redirect('/edit-post/'.$post->id)->withErrors([
                'validation' => 'Please fill in all required fields'
            ]);
        }

        // Remove any HTML tags from title and body to prevent malicious code injection
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);

        return redirect('/');
    }

    public function delete(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }

        return redirect('/');
    }
}
