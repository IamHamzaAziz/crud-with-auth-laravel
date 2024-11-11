<nav style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #007bff; color: white;">
    <a href="/" style="color: white; text-decoration: none; font-weight: bold;">Home</a>
    @auth
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="/post" style="color: white; text-decoration: none; font-weight: bold;">Create Post</a>
            <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="color: white; text-decoration: none; font-weight: bold; background-color: #8B0000; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Logout</button>
            </form>
        </div>
    @else
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="/login" style="color: white; text-decoration: none; font-weight: bold; background-color: #00008B; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Login</a>
            <a href="/register" style="color: white; text-decoration: none; font-weight: bold; background-color: #006400; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer;">Register</a>
        </div>
    @endauth
</nav>