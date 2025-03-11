@props([
    'name',
    'size' => '5', // Default size is 5
    'class' => '' // Allow additional classes
])

@php
    $iconPath = resource_path("views/components/icons/{$name}.blade.php");
@endphp

@if(file_exists($iconPath))
    @include("components.icons.{$name}", ['class' => "size-{$size} {$class}"])
@else
    <span class="text-red-500">[Icon Missing: {{ $name }}]</span>
@endif