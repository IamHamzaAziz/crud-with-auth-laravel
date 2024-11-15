@extends('layout.admin')

@section('admin_content')
    <h1 class="text-3xl font-bold mb-6">Manage Posts</h1>

    @foreach ($posts as $post)
        <div class="p-4 rounded border border-gray-300 mb-4">
            <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
            <p class="mb-4">{{ $post->content }}</p>

            <form action="/admin/delete-post/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full p-3 rounded bg-[#8B0000] text-white cursor-pointer mb-2">Delete
                    Post</button>
            </form>

            <a href="/admin/edit-post/{{ $post->id }}"
                class="w-full block p-3 rounded bg-blue-500 text-white cursor-pointer mb-2 text-center">Edit Post</a>
        </div>
    @endforeach
@endsection
