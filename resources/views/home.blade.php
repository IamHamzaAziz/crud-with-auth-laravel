<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f0f0f0] m-0 p-0">
    {{-- @include('components.navbar') --}}
    <x-navbar />

    @auth
        <h1 class="text-center text-3xl font-bold my-6">Welcome {{ auth()->user()->name }}</h1>

        @if(count($posts) === 0)
            <p class="text-center text-gray-600 my-5">You have no posts yet. Create your first post!</p>
        @endif

        @foreach ($posts as $post)
            <div class="w-4/5 mx-auto p-4 rounded border border-gray-300 mb-4">
                <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                <p class="mb-4">{{ $post->body }}</p>

                <form action="/post/{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full p-3 rounded bg-[#8B0000] text-white cursor-pointer mb-2">Delete Post</button>
                </form>

                <a href="/post/{{ $post->id }}" class="w-full block p-3 rounded bg-blue-500 text-white cursor-pointer mb-2 text-center">Edit Post</a>
            </div>
        @endforeach
    @else
        <h1 class="text-center text-3xl font-bold my-6">Please Login or Register to Create Posts</h1>
    @endauth
</body>
</html>