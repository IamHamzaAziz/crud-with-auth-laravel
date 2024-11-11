<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f0f0f0] m-0 p-0">
    <x-navbar />
    
    <h1 class="text-center text-3xl font-bold my-6">Edit Post</h1>

    @if($errors->any())
        <div class="text-red-500 text-center mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/post/{{ $post->id }}" method="POST" class="w-4/5 mx-auto flex flex-col items-center space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="title" placeholder="Title" value="{{ $post->title }}" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
        <textarea name="body" placeholder="Body" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>{{ $post->body }}</textarea>
        <button type="submit" class="w-full p-3 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200 cursor-pointer">Update Post</button>
    </form>
</body>
</html>