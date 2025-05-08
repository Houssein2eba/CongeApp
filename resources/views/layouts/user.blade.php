<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CongeApp') }} - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css'])
    @livewireStyles
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <!-- Left Nav -->
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('employee.dashboard') }}" class="text-xl font-bold text-indigo-600">
                                CongeApp
                            </a>
                        </div>
                        
                        <!-- Mobile menu button -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Right Nav -->
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5">
                                <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="flex">
            <div class="hidden md:flex md:flex-shrink-0">
                <div class="flex flex-col w-64">
                    <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto bg-white border-r border-gray-200">
                        <div class="flex flex-col flex-grow">
                            <nav class="flex-1 px-2 space-y-1">
                                <a href="{{ route('employee.dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Dashboard
                                </a>

                                <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    My Leave Requests
                                </a>

                                <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                                    <svg class="mr-3 flex-shrink-0 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Leave Balance
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <div class="py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                            <h1 class="text-2xl font-semibold text-gray-900">@yield('header')</h1>
                            <div class="mt-3 sm:mt-0 sm:ml-4">
                                @yield('breadcrumb')
                            </div>
                        </div>
                    </div>

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                        <div class="py-4">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <div class="text-gray-500 text-sm">
                        Copyright &copy; {{ date('Y') }} CongeApp. All rights reserved.
                    </div>
                    <div class="text-gray-500 text-sm">
                        Employee Portal
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireScripts
    @stack('scripts')

    <script>
        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const sidebar = document.querySelector('.md\\:flex-shrink-0');

            mobileMenuButton.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>