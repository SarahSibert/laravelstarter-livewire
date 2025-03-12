<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800 flex space-x-8" x-data="{ sidebarOpen: false}">
        <!-- Mobile Menu Button (Top Left) -->
        <button @click="sidebarOpen = !sidebarOpen"
            x-show="!sidebarOpen"
            class="fixed top-2 left-2 lg:hidden z-50 p-2 rounded-lg text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <x-icon name="bars-2" class="w-6 h-6" />
        </button>
    
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'flex' : 'hidden lg:flex'" class="min-h-screen w-64 p-4 border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 flex-col justify-between fixed lg:relative z-40">  
            <!-- Close Button for Mobile -->
            <button @click="sidebarOpen = false"
                x-show="sidebarOpen"
                class="absolute top-2 right-2 lg:hidden p-2 rounded-lg text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <x-icon name="x-mark" class="w-6 h-6" />
            </button>
    
            <!-- Top Section -->
            <div>
                <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2 dark:text-white/80 px-1" wire:navigate>
                    <x-app-logo />
                </a>
        
                <x-navlist variant="outline" class="mt-4">
                    <x-navlink icon="home" href="{{ route('dashboard') }}" :current="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-navlink>
                </x-navlist>
            </div>
        
            <!-- Middle Spacer (Pushes Bottom Section Down) -->
            <div class="flex-1"></div>
        
            <!-- Bottom Section -->
            <div>
                <x-navlist variant="outline">
                    <x-navlink icon="folder" :href="'https://github.com/laravel/livewire-starter-kit'" target="_blank">
                        {{ __('Repository') }}
                    </x-navlink>
                    
                    <x-navlink icon="book-open" :href="'https://laravel.com/docs/starter-kits'" target="_blank">
                        {{ __('Documentation') }}
                    </x-navlink>
                </x-navlist>
        
                <!-- User menu -->
                <div x-data="{ open: false }" class="relative mt-4">
                    <!-- Dropdown Trigger -->
                    <button @click="open = !open" class="flex justify-between items-center gap-2 px-2 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                        <div class="flex items-center gap-2">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>
                            <span>{{ auth()->user()->name }}</span>
                        </div>
                        <x-icon name="chevron-up-down" />
                    </button>
        
                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute left-0 bottom-full mb-2 w-[220px] bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden z-50">
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
                        <a href="/settings/profile" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <x-icon name="cog" class="w-5 h-5" />
                            {{ __('Settings') }}
                        </a>
        
                        <div class="border-t border-gray-200 dark:border-gray-700"></div>
        
                        <!-- Logout Form -->
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                <x-icon name="arrow-right-start-on-rectangle" class="w-5 h-5" />
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile User Dropdown (Top Right) -->
        <div x-data="{ userMenuOpen: false }" class="lg:hidden z-50">
            <!-- Mobile User Icon (Initials) -->
            <button @click="console.log('Button clicked'); userMenuOpen = !userMenuOpen"
                class="fixed top-2 right-2 flex items-center gap-2 px-1 py-2 rounded-lg text-sm font-medium text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                    <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                        {{ auth()->user()->initials() }}
                    </span>
                </span>
            </button>

            <!-- Mobile Dropdown Menu -->
            <div x-show="userMenuOpen" @click.away="userMenuOpen = false"
            style="display: block !important;"
            class="absolute right-0 mt-2 w-[220px] bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden z-50">
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
                <a href="/settings/profile" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <x-icon name="cog" class="w-5 h-5" />
                    {{ __('Settings') }}
                </a>

                <div class="border-t border-gray-200 dark:border-gray-700"></div>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <x-icon name="arrow-right-start-on-rectangle" class="w-5 h-5" />
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
            
        <!-- Main Content -->
        <div class="flex-1">
            {{ $slot }}
        </div>
    
        @livewireScripts
    </body>
</html>
