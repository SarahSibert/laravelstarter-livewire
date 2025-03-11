@props(['label' => null, 'disabled' => false])

<div class="space-y-2">
    @if($label)
        <label for="{{ $attributes->get('id') }}" class="text-sm font-medium text-zinc-800 dark:text-white block">
            {{ $label }}
        </label>
    @endif

    <input {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'w-full border rounded-lg block disabled:shadow-none dark:shadow-none appearance-none text-base sm:text-sm py-2 h-10 leading-[1.375rem] pl-3 pr-3 bg-white dark:bg-white/10 dark:disabled:bg-white/[7%] text-zinc-700 disabled:text-zinc-500 placeholder-zinc-400 disabled:placeholder-zinc-400/70 dark:text-zinc-300 dark:disabled:text-zinc-400 dark:placeholder-zinc-400 dark:disabled:placeholder-zinc-500 shadow-xs border-zinc-200 border-b-zinc-300/80 disabled:border-b-zinc-200 dark:border-white/10 dark:disabled:border-white/5 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-black']) !!}>
</div>