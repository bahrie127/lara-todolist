<!DOCTYPE html>
<html>

<head>
    <title>Lara Todolist</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="mb-4 text-2xl">
        @yield('title')
    </h1>

    <div>
        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>

</html>
