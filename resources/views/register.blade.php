<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body style="background-color: #f0f0f0; margin: 0; padding: 0;">
    <x-navbar />

    <h1 style="text-align: center;">Register</h1>

    @if($errors->any())
        <div style="color: red; text-align: center; margin-bottom: 10px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST" style="width: 80%; margin: 0 auto; display: flex; flex-direction: column; align-items: center; gap: 10px;">
        @csrf
        <input type="text" name="name" placeholder="Name" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        <input type="email" name="email" placeholder="Email" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        <input type="password" name="password" placeholder="Password" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        <button type="submit" style="width: 100%; padding: 10px; border-radius: 5px; background-color: #007bff; color: white; border: none; cursor: pointer;">Register</button>
    </form>
</body>
</html>