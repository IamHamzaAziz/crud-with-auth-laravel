<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminPost;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function add_post()
    {
        return view('admin.posts.add_post');
    }

    public function create_post(Request $request)
    {
        try {
            $incomingFields = $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            AdminPost::create($incomingFields);

            return redirect()->route('view_posts');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('create_post_page')->with('error', 'Something went wrong');
        }
    }

    public function view_posts()
    {
        $posts = AdminPost::all();
        return view('admin.posts.view_posts', compact('posts'));
    }

    public function edit_post($id)
    {
        $post = AdminPost::find($id);
        return view('admin.posts.edit_post', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        try {
            $incomingFields = $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            $post = AdminPost::find($id);
            $post->update($incomingFields);

            return redirect()->route('view_posts');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/admin/edit-post/' . $id)->with('error', 'Something went wrong');
        }
    }

    public function delete_post($id)
    {
        $post = AdminPost::find($id);
        $post->delete();
        return redirect()->route('view_posts');
    }
}
