<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800" x-data="{ sidebarOpen: false }">
        <!-- Sidebar (Mobile) -->
        <div x-show="sidebarOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full"
            class="fixed inset-y-0 left-0 w-64 p-4 border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 flex flex-col justify-between z-50 lg:hidden">
            
            <!-- Close Button for Mobile -->
            <button @click="sidebarOpen = false"
                class="absolute top-2 right-2 p-2 rounded-lg text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <x-icon name="x-mark" class="w-6 h-6" />
            </button>
    
            <!-- Sidebar Navigation -->
            <div>
                <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2 dark:text-white/80 px-1" wire:navigate>
                    <x-app-logo />
                </a>
    
                <x-navlist class="mt-4 flex-col">
                    <x-navlink icon="home" href="{{ route('dashboard') }}" :current="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-navlink>
                </x-navlist>
            </div>
    
            <div class="flex-1"></div>
    
            <!-- Bottom Section -->
            <div>
                <x-navlist class="flex-col">
                    <x-navlink icon="folder" :href="'https://github.com/laravel/livewire-starter-kit'" target="_blank">
                        {{ __('Repository') }}
                    </x-navlink>
    
                    <x-navlink icon="book-open" :href="'https://laravel.com/docs/starter-kits'" target="_blank">
                        {{ __('Documentation') }}
                    </x-navlink>
                </x-navlist>
            </div>
        </div>
    
        <!-- Header -->    
        <div class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <div class="max-w-7xl mx-auto flex items-center px-10 justify-end lg:justify-between"> 
                <!-- Mobile Menu Button (Top Left) -->
                <button @click="sidebarOpen = !sidebarOpen"
                    x-show="!sidebarOpen"
                    class="lg:fixed top-2 left-2 lg:hidden z-50 p-2 rounded-lg text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <x-icon name="bars-2" class="w-6 h-6" />
                </button>
    
                <div class="flex space-x-2">
                    <a href="{{ route('dashboard') }}" class="ml-2 mr-5 flex items-center space-x-2 lg:ml-0 dark:text-white/80" wire:navigate>
                        <x-app-logo />
                    </a>
            
                    <x-navlist class="hidden lg:flex lg:flex-col">
                        <x-navlink variant="underline" icon="home" href="{{ route('dashboard') }}" :current="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-navlink>
                    </x-navlist>
                </div>
                
                <!-- Right Side -->
                <div class="flex items-center ml-auto">
                    <x-navlist class="hidden lg:flex">
                        <x-navlink icon="folder" :href="'https://github.com/laravel/livewire-starter-kit'" target="_blank"></x-navlink>
                        <x-navlink icon="book-open" :href="'https://laravel.com/docs/starter-kits'" target="_blank"></x-navlink>
                    </x-navlist>
    
                    <!-- User menu -->
                    <div x-data="{ open: false }" class="relative ml-2">
                        <!-- Dropdown Trigger -->
                        <button @click="open = !open"
                            class="flex justify-between items-center gap-2 px-2 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>
                            </div>
                            <x-icon name="chevron-up-down" />
                        </button>
    
                        <!-- Dropdown Menu -->
                        <div x-show="open" x-cloak x-transition.opacity.scale.95
                            @click.away="open = false"
                            class="absolute right-0 mt-2 w-[200px] bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden z-50">
                            <div class="px-4 py-3 text-sm font-normal">
                                <div class="flex items-center gap-2">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>
                                    <div class="grid flex-1 text-left text-sm leading-tight">
                                        <span class="truncate font-semibold dark:text-white/80">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
    
                            <div class="border-t border-gray-200 dark:border-gray-700"></div>
    
                            <!-- Settings Link -->
                            <a href="/settings/profile"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <x-icon name="cog" class="w-5 h-5" />
                                {{ __('Settings') }}
                            </a>
    
                            <div class="border-t border-gray-200 dark:border-gray-700"></div>
    
                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="w-full flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <x-icon name="arrow-right-start-on-rectangle" class="w-5 h-5" />
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Main Content -->
        <div class="flex-1 mx-10">
            {{ $slot }}
        </div>
    
        @livewireScripts
    </body>
</html>
