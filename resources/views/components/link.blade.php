@php
    $classes = " text-sm text-gray-500 hover:text-green-900"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>