<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-navbar />

    <div class="grid grid-cols-10">
        <x-admin_sidebar />

        <div class="col-span-8 p-8 border border-gray-300 rounded-md">
            <h1 class="text-3xl font-bold mb-6">Edit Post</h1>

            <form action="/admin/edit-post/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')

                <input type="text" name="title" value="{{ $post->title }}" class="w-full p-3 rounded border border-gray-300 mb-2">
                <input type="text" name="content" value="{{ $post->content }}" class="w-full p-3 rounded border border-gray-300 mb-2">

                <button type="submit" class="w-full p-3 rounded bg-blue-500 text-white cursor-pointer mb-2">Update Post</button>
            </form>
        </div>
    </div>
</body>
</html>