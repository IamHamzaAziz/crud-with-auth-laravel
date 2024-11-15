@extends('layout.default')

@section('title')
    Login
@endsection

@section('content')

    <h1 class="text-center text-3xl font-bold my-6">Login</h1>

    @if($errors->any())
        <div class="text-red-500 text-center mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/login" method="POST" class="w-4/5 mx-auto flex flex-col items-center space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Name" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
        <button type="submit" class="w-full p-3 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200 cursor-pointer">Login</button>
    </form>

@endsection