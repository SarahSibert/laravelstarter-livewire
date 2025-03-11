<div class="flex items-start max-md:flex-col">
    <div class="mr-10 w-full pb-4 md:w-[220px]">
        <x-navlist>
            <x-navlink :href="route('settings.profile')" wire:navigate>{{ __('Profile') }}</x-navlink>
            <x-navlink :href="route('settings.password')" wire:navigate>{{ __('Password') }}</x-navlink>
            <x-navlink :href="route('settings.appearance')" wire:navigate>{{ __('Appearance') }}</x-navlink>
        </x-navlist>
    </div>

    <div role="none" class="border-0 print:color-adjust bg-zinc-800/5 dark:bg-white/10 h-px w-full my-6 md:hidden"></div>

    <div class="flex-1 self-stretch max-md:pt-6">
        <h1>{{ $heading ?? '' }}</h1>
        <p>{{ $subheading ?? '' }}</p>

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
