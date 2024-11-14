<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <x-navbar />

    <div class="grid grid-cols-10">
        <!-- Sidebar -->
        <x-admin_sidebar />

        <!-- Main Content -->
        <div class="col-span-7 p-8">
            <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
            <!-- Add your dashboard content here -->
        </div>
    </div>
</body>
</html>