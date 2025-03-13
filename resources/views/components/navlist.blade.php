<nav {{ $attributes->merge(['class' => 'flex overflow-visible min-h-auto']) }}>
    {{ $slot->withAttributes(['variant' => $attributes->get('variant')]) }}
</nav>