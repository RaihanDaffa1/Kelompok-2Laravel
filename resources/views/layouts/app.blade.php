<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/a2e0b1c6f0.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 text-gray-900 flex min-h-screen">

    <!-- ===== SIDEBAR ===== -->
    <aside id="sidebar" class="bg-white w-64 border-r border-gray-200 flex flex-col transition-all duration-300 ease-in-out">
        <!-- Logo / Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <h1 class="text-xl font-bold text-blue-600">Admin Panel</h1>
            <button id="toggleSidebar" class="lg:hidden text-gray-600 hover:text-gray-900">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <!-- Nav -->
        <nav class="flex-1 overflow-y-auto">
            <ul class="p-4 space-y-2 text-sm font-medium">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-blue-50 text-gray-700 {{ request()->is('dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                        <i class="fa-solid fa-gauge-high"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('student.index') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-blue-50 text-gray-700 {{ request()->is('student*') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                        <i class="fa-solid fa-user-graduate"></i>
                        Data Siswa
                    </a>
                </li>

                <!-- ===== MENU BARU: DATA GURU ===== -->
        <li>
            <a href="{{ route('teacher.index') }}" 
                class="flex items-center gap-3 p-2 rounded-lg hover:bg-blue-50 text-gray-700 
                {{ request()->is('teacher*') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                <i class="fa-solid fa-chalkboard-user"></i>
                Data Guru
            </a>
        </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-blue-50 text-gray-700 {{ request()->is('profile') ? 'bg-blue-100 text-blue-700 font-semibold' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        Profil
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Footer -->
        <div class="border-t border-gray-200 p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navbar -->
        <header class="bg-white shadow-md flex items-center justify-between px-6 py-3">
            <div class="flex items-center gap-3">
                <button id="toggleSidebarMobile" class="text-gray-600 hover:text-gray-900 lg:hidden">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <h2 class="font-semibold text-lg text-blue-700">
                    @yield('title', 'Dashboard')
                </h2>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-700">
                    {{ Auth::user()->name }}
                </span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff" alt="avatar" class="w-8 h-8 rounded-full">
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- ===== SCRIPT ===== -->
    <script>
        // Sidebar toggle (mobile)
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');
        const toggleSidebarMobile = document.getElementById('toggleSidebarMobile');

        toggleSidebar?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        toggleSidebarMobile?.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Responsive collapse on load
        if (window.innerWidth < 1024) {
            sidebar.classList.add('-translate-x-full', 'absolute', 'z-40', 'h-full');
        } else {
            sidebar.classList.remove('-translate-x-full', 'absolute');
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full', 'absolute', 'z-40', 'h-full');
            } else {
                sidebar.classList.remove('-translate-x-full', 'absolute');
            }
        });
    </script>
</body>
</html>
