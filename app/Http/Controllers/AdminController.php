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
        return view('admin.add_post');
    }

    public function create_post(Request $request)
    {
        try {
            $incomingFields = $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['content'] = strip_tags($incomingFields['content']);

            AdminPost::create($incomingFields);

            return redirect('/admin');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/admin/create-post')->with('error', 'Something went wrong');
        }
    }

    public function view_posts()
    {
        $posts = AdminPost::all();
        return view('admin.view_posts', compact('posts'));
    }

    public function edit_post($id)
    {
        $post = AdminPost::find($id);
        return view('admin.edit_post', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        try {
            $incomingFields = $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['content'] = strip_tags($incomingFields['content']);

            $post = AdminPost::find($id);
            $post->update($incomingFields);

            return redirect('/admin/view-posts');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/admin/edit-post/' . $id)->with('error', 'Something went wrong');
        }
    }

    public function delete_post($id)
    {
        $post = AdminPost::find($id);
        $post->delete();
        return redirect('/admin/view-posts');
    }
}
