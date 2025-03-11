@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <h1 class="text-xl">{{ $title }}</h1>
    <p>{{ $description }}</p>
</div>
