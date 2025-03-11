@props(['label' => null])

<div class="flex items-center space-x-2">
    <input type="checkbox" {!! $attributes->merge(['class' => 'rounded-lg border border-gray-300 text-zinc-900 shadow-xs focus:bg-zinc-900 focus:ring-zinc-900 hover:border-zinc-900']) !!}>

    @if($label)
        <label for="{{ $attributes->get('id') }}" class="text-sm font-medium text-zinc-800 dark:text-white block mb-1">
            {{ $label }}
        </label>
    @endif
</div>