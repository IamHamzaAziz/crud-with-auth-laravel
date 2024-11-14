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
            <h1 class="text-3xl font-bold mb-6">Add Post</h1>

            @foreach ($posts as $post)
                <div class="p-4 rounded border border-gray-300 mb-4">
                    <h3 class="text-xl font-bold mb-2">{{ $post->title }}</h3>
                    <p class="mb-4">{{ $post->content }}</p>

                    <form action="/admin/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full p-3 rounded bg-[#8B0000] text-white cursor-pointer mb-2">Delete Post</button>
                    </form>

                    <a href="/admin/edit-post/{{ $post->id }}" class="w-full block p-3 rounded bg-blue-500 text-white cursor-pointer mb-2 text-center">Edit Post</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>