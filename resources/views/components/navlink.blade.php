@props([
    'href' => '#',
    'current' => false,
    'content' => null,
    'icon' => null,
    'target' => null, // Allow opening in new tab
])

@php
    use Illuminate\Support\Str;

    // Determine if the link is external (starts with http/https)
    $isExternal = Str::startsWith($href, ['http://', 'https://']);
    $isActive = $current || (!$isExternal && request()->url() === url($href));
@endphp

<a 
    href="{{ $href }}" 
    @if($isExternal) target="_blank" rel="noopener noreferrer" @endif
    {{ $attributes->merge([
        'class' => 'h-10 lg:h-8 relative flex items-center gap-3 rounded-lg py-0 text-left w-full px-3 my-px ' .
                   'text-zinc-500 dark:text-white/80 hover:text-zinc-800 dark:hover:text-white hover:bg-zinc-800/[4%] dark:hover:bg-white/[7%] ' .
                   ($isActive ? 'text-zinc-800 dark:text-white bg-zinc-800/[4%] dark:bg-white/[7%]' : '')
    ]) }}
>
    @if($icon)
        <x-icon :name="$icon" class="w-5 h-5 text-zinc-500 dark:text-white/80" />
    @endif

    <div class="flex-1 text-sm font-medium leading-none whitespace-nowrap">
        {{ $content ?? $slot }}
    </div>
</a>