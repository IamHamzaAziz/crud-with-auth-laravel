@extends('layout.default')

@section('title')
    Admin Panel
@endsection

@section('content')
    <div class="grid grid-cols-10">
        <!-- Sidebar -->
        <x-admin_sidebar />

        <!-- Main Content -->
        <div class="col-span-8 p-8">
            @yield('admin_content')
        </div>
    </div>
@endsection
