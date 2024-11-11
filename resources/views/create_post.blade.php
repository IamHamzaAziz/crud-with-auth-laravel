<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body style="background-color: #f0f0f0; margin: 0; padding: 0;">
    <x-navbar />
    
    <h1 style="text-align: center;">Create Post</h1>
    
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
    </form>
</body>
</html>