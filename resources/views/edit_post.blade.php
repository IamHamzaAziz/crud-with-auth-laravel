<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body style="background-color: #f0f0f0; margin: 0; padding: 0;">
    <x-navbar />
    
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