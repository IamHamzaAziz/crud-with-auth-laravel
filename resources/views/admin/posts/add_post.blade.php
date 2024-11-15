@extends('layout.admin')

@section('admin_content')
    <h1 class="text-3xl font-bold mb-6">Add Post</h1>

    @if (session('error'))
        <div class="bg-red-500 text-white p-2 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <form action="/admin/create-post" method="post" class="space-y-4 w-full">
        @csrf
        <input type="text" name="title" placeholder="Title" class="p-2 w-full rounded-md border-2 border-gray-300">
        <input type="text" name="content" placeholder="Content" class="p-2 w-full rounded-md border-2 border-gray-300">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Add Post</button>
    </form>
@endsection
