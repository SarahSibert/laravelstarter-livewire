@props(['variant' => 'default'])

@php
    $classes = match ($variant) {
        'primary' => 'bg-[var(--color-accent)] hover:bg-[color-mix(in_oklab,_var(--color-accent),_transparent_10%)] text-[var(--color-accent-foreground)] border border-black/10 dark:border-0 shadow-[inset_0px_1px_--theme(--color-white/.2)]',
        'filled' => 'bg-zinc-800/5 hover:bg-zinc-800/10 dark:bg-white/10 dark:hover:bg-white/20 text-zinc-800 dark:text-white',
        'danger' => 'bg-red-500 hover:bg-red-600 dark:bg-red-600 dark:hover:bg-red-500 text-white shadow-[inset_0px_1px_var(--color-red-500),inset_0px_2px_--theme(--color-white/.15)] dark:shadow-none',
        'ghost' => 'bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-800 dark:text-white',
        'subtle' => 'bg-transparent hover:bg-zinc-800/5 dark:hover:bg-white/15 text-zinc-400 hover:text-zinc-800 dark:text-zinc-400 dark:hover:text-white',
        default => 'bg-white hover:bg-zinc-50 dark:bg-zinc-700 dark:hover:bg-zinc-600/75 text-zinc-800 dark:text-white border border-zinc-200 hover:border-zinc-200 border-b-zinc-300/80 dark:border-zinc-600 dark:hover:border-zinc-600 shadow-xs',
    };
@endphp

<button {{ $attributes->merge(['class' => "relative items-center font-medium justify-center gap-2 whitespace-nowrap disabled:opacity-75 dark:disabled:opacity-75 disabled:cursor-default disabled:pointer-events-none h-10 text-sm rounded-lg px-4 inline-flex $classes"]) }}>
    {{ $slot }}
</button>