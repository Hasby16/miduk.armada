@props(['active'])

@php
$classes = $active ?? false ? 'block px-4 py-2 mt-2 text-sm font-semibold text-white bg-blue-500 rounded-lg hover:text-white focus:text-white hover:bg-blue-400 focus:bg-blue-400 focus:outline-none focus:shadow-outline transition' : 'block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg hover:text-white focus:text-white hover:bg-blue-400 focus:bg-blue-400 focus:outline-none focus:shadow-outline transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
