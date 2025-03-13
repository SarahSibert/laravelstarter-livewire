@props([
    'href' => '#',
    'current' => false,
    'content' => null,
    'icon' => null,
    'target' => null,
    'variant' => null, // Passed explicitly
])

@php
    use Illuminate\Support\Str;

    // Determine active state for internal links
    $isActive = $current || request()->url() === url($href);

    // Define base styles
    $baseClasses = 'h-10 lg:h-8 relative flex items-center gap-3 rounded-lg py-0 text-left w-full px-3 my-px text-zinc-500 dark:text-white/80';

    // Styles for hover and active states
    $hoverClasses = $variant === 'underline'
        ? 'hover:bg-zinc-800/[4%] dark:hover:bg-white/[7%]'
        : 'hover:text-zinc-800 dark:hover:text-white hover:bg-zinc-800/[4%] dark:hover:bg-white/[7%]';
    
    $activeClasses = $isActive
        ? ($variant === 'underline'
            ? 'text-zinc-800 dark:text-white bg-transparent after:absolute after:bottom-[-8px] after:left-0 after:right-0 after:h-[1px] after:bg-zinc-900 dark:after:bg-white after:content-[""]'
            : 'text-zinc-800 dark:text-white bg-zinc-800/[4%] dark:bg-white/[7%]')
        : '';
@endphp

<a 
    href="{{ $href }}" 
    @if($target) target="{{ $target }}" rel="noopener noreferrer" @endif
    {{ $attributes->merge([
        'class' => $baseClasses . ' ' . $hoverClasses . ' ' . $activeClasses
    ]) }}
>
    @if($icon)
        <x-icon :name="$icon" class="w-5 h-5 text-zinc-500 dark:text-white/80" />
    @endif

    <div class="flex-1 text-sm font-medium leading-none whitespace-nowrap">
        {{ $content ?? $slot }}
    </div>
</a>