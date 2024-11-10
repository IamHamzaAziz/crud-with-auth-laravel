<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body style="background-color: #f0f0f0; margin: 0; padding: 0;">
    <nav style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #007bff; color: white;">
        <a href="/" style="color: white; text-decoration: none; font-weight: bold;">Home</a>
        @auth
            <div style="display: flex; gap: 10px; align-items: center;">
                <a href="/create-post" style="color: white; text-decoration: none; font-weight: bold;">Create Post</a>
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="color: white; text-decoration: none; font-weight: bold; background-color: #8B0000; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Logout</button>
                </form>
            </div>
        @else
            <div style="display: flex; gap: 10px; align-items: center;">
                <a href="/login" style="color: white; text-decoration: none; font-weight: bold; background-color: #00008B; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Login</a>
                <a href="/register" style="color: white; text-decoration: none; font-weight: bold; background-color: #006400; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Register</a>
            </div>
        @endauth
    </nav>

    <h1 style="text-align: center;">Edit Post</h1>

    @if($errors->any())
        <div style="color: red; text-align: center; margin-bottom: 10px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/edit-post/{{ $post->id }}" method="POST" style="width: 80%; margin: 0 auto; display: flex; flex-direction: column; align-items: center; gap: 10px;">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="Title" value="{{ $post->title }}" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        <textarea name="body" placeholder="Body" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">{{ $post->body }}</textarea>
        <button type="submit" style="width: 100%; padding: 10px; border-radius: 5px; background-color: #007bff; color: white; border: none; cursor: pointer;">Update Post</button>
    </form>
</body>
</html>