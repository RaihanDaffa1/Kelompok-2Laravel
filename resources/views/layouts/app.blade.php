<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">

<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white flex flex-col">
        <div class="p-4 text-2xl font-bold border-b border-gray-700">
            Admin Panel
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-gray-700">
                <i class="fa-solid fa-gauge mr-3"></i> Dashboard
            </a>
            <a href="{{ route('student.index') }}" class="flex items-center px-3 py-2 rounded-md hover:bg-gray-700">
                <i class="fa-solid fa-user-graduate mr-3"></i> Data Siswa
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-gray-700">
                <i class="fa-solid fa-users mr-3"></i> Users
            </a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-gray-700">
                <i class="fa-solid fa-gear mr-3"></i> Settings
            </a>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full px-3 py-2 rounded-md bg-red-600 hover:bg-red-700">
                    <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">{{ $title ?? 'Dashboard' }}</h1>
            <div class="flex items-center space-x-4">
                <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}" class="w-8 h-8 rounded-full">
            </div>
        </header>

        <section class="p-6">
            @yield('content')
        </section>

        <footer class="text-center p-4 bg-gray-200 text-sm">
            © {{ date('Y') }} - Admin Dashboard by Daffa 🌸
        </footer>
    </main>
</div>
</body>
</html>
