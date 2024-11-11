<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f0f0f0] m-0 p-0">
    <x-navbar />
    
    {{-- <h1 style="text-align: center;">Create Post</h1>
    
    @if($errors->any())
        <div style="color: red; text-align: center; margin-bottom: 10px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    
    <form action="/post" method="POST" style="margin-top: 20px;">
        @csrf
        <input type="text" name="title" placeholder="Title" style="width: 80%; display: block; margin:auto; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;">
        <textarea name="body" placeholder="Body" style="width: 80%; display: block; margin: auto; padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;"></textarea>
        <button type="submit" style="width: 80%; display: block; margin: auto; padding: 10px; border-radius: 5px; background-color: #007bff; color: white; border: none; cursor: pointer; margin-bottom: 10px;">Create Post</button>
    </form> --}}

    <h1 class="text-center text-3xl font-bold my-6">Create Post</h1>

    @if($errors->any())
        <div class="text-red-500 text-center mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/post" method="POST" class="mt-5 w-4/5 mx-auto flex flex-col items-center space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Title" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500">
        <textarea name="body" placeholder="Body" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500 h-32"></textarea>
        <button type="submit" class="w-full p-3 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200 cursor-pointer">Create Post</button>
    </form>
</body>
</html>