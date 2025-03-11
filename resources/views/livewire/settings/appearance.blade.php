<div class="flex flex-col items-start">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading=" __('Update the appearance settings for your account')">
        <div x-data="themeSwitcher()" x-init="loadTheme()" class="flex w-full bg-gray-100 dark:bg-gray-700 p-2 rounded-lg">
            <label class="flex flex-1 items-center justify-center px-3 py-1.5 rounded-lg cursor-pointer space-x-2 min-w-0"
                :class="theme === 'light' ? 'bg-white shadow' : 'hover:bg-gray-200 dark:hover:bg-gray-700'"
                @click="setTheme('light')">
                <input type="radio" x-model="theme" value="light" class="hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"
                    :class="theme === 'light' ? 'text-gray-900' : 'text-gray-900 dark:text-gray-300'">
                    <path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" />
                </svg>                                   
                <span class="text-gray-900 dark:text-gray-300">Light</span>
            </label>
        
            <label class="flex flex-1 items-center justify-center px-3 py-1.5 rounded-lg cursor-pointer space-x-2 min-w-0"
                :class="theme === 'dark' ? 'bg-white shadow' : 'hover:bg-gray-200 dark:hover:bg-gray-700'"
                @click="setTheme('dark')">
                <input type="radio" x-model="theme" value="dark" class="hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"
                    :class="theme === 'dark' ? 'text-gray-600' : 'text-gray-900 dark:text-gray-300'">
                    <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
                </svg>  
                <span class="text-gray-900 dark:text-gray-600">Dark</span>
            </label>
        
            <label class="flex flex-1 items-center justify-center px-3 py-1.5 rounded-lg cursor-pointer space-x-2 min-w-0"
                :class="theme === 'system' ? 'bg-white shadow' : 'hover:bg-gray-200 dark:hover:bg-gray-700'"
                @click="setTheme('system')">
                <input type="radio" x-model="theme" value="system" class="hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5"
                    :class="theme === 'system' ? 'text-gray-900 dark:text-gray-300' : 'text-gray-900 dark:text-gray-300'">
                    <path fill-rule="evenodd" d="M2.25 5.25a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3V15a3 3 0 0 1-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 0 1-.53 1.28h-9a.75.75 0 0 1-.53-1.28l.621-.622a2.25 2.25 0 0 0 .659-1.59V18h-3a3 3 0 0 1-3-3V5.25Zm1.5 0v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5Z" clip-rule="evenodd" />
                </svg> 
                <span class="text-gray-900 dark:text-gray-300">System</span>
            </label>
        </div>
        
        <script>
        function themeSwitcher() {
            return {
                theme: 'light',
                setTheme(mode) {
                    this.theme = mode;
                    localStorage.setItem('theme', mode);
        
                    if (mode === 'dark') {
                        document.documentElement.classList.add('dark');
                    } else if (mode === 'light') {
                        document.documentElement.classList.remove('dark');
                    } else {
                        // System mode (follow user OS preference)
                        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                    }
                },
                loadTheme() {
                    let savedTheme = localStorage.getItem('theme') || 'system';
                    this.setTheme(savedTheme);
                }
            };
        }
        </script>
          
    </x-settings.layout>
</div>
