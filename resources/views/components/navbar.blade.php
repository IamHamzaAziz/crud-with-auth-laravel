<script src="https://cdn.tailwindcss.com"></script>

<nav class="flex justify-between items-center p-3 bg-blue-500 text-white">
    <a href="/" class="text-white no-underline font-bold">Home</a>
    @auth
        <div class="flex gap-3 items-center">
            <a href="/post" class="text-white no-underline font-bold">Create Post</a>
            <form action="/logout" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-white no-underline font-bold bg-[#8B0000] px-5 py-2.5 rounded border-none cursor-pointer">Logout</button>
            </form>
        </div>
    @else
        <div class="flex gap-3 items-center">
            <a href="/login" class="text-white no-underline font-bold bg-[#00008B] px-5 py-2.5 rounded border-none cursor-pointer">Login</a>
            <a href="/register" class="text-white no-underline font-bold bg-[#006400] px-5 py-2.5 rounded border-none cursor-pointer">Register</a>
        </div>
    @endauth
</nav>