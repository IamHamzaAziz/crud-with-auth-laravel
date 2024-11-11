<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud App</title>
</head>
<body style="background-color: #f0f0f0; margin: 0; padding: 0;">
    {{-- @include('components.navbar') --}}
    <x-navbar />

    @auth
        <h1 style="text-align: center;">Welcome {{ auth()->user()->name }}</h1>

        @if(count($posts) === 0)
            <p style="text-align: center; color: #666; margin: 20px 0;">You have no posts yet. Create your first post!</p>
        @endif

        @foreach ($posts as $post)
            <div style="width: 80%; display: block; margin: auto; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>

                <form action="/delete-post/{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="width: 100%; padding: 10px; border-radius: 5px; background-color: #8B0000; color: white; border: none; cursor: pointer; margin-bottom: 10px;">Delete Post</button>
                </form>

                <a href="/edit-post/{{ $post->id }}" style="width: 98%; display: block; padding: 10px; border-radius: 5px; background-color: #007bff; color: white; border: none; cursor: pointer; margin-bottom: 10px; text-align: center;">Edit Post</a>
            </div>
        @endforeach
    @else
        <h1 style="text-align: center;">Please Login or Register to Create Posts</h1>
    @endauth
</body>
</html>