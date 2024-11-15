@extends('layout.default')

@section('title')
    Register
@endsection

@section('content')

    <h1 class="text-center text-3xl font-bold my-6">Register</h1>

    @if($errors->any())
        <div class="text-red-500 text-center mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST" class="w-4/5 mx-auto flex flex-col items-center space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Name" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
        <input type="email" name="email" placeholder="Email" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-3 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
        <button type="submit" class="w-full p-3 rounded bg-[#006400] text-white cursor-pointer">Register</button>
    </form>

@endsection