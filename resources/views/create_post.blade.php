@extends('layout.default')

@section('title')
    Create Post
@endsection

@section('content')
    <h1 class="text-center text-3xl font-bold my-6">Create Post</h1>

    @if ($errors->any())
        <div class="text-red-500 text-center mb-4">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/post" method="POST" class="mt-5 w-4/5 mx-auto flex flex-col items-center space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Title"
            class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
        <textarea name="body" placeholder="Body"
            class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500 h-32" required></textarea>
        <button type="submit"
            class="w-full p-3 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200 cursor-pointer">Create
            Post</button>
    </form>
@endsection
