@props(['active' => false])

@php
    
    $classes = 'flex items-center lg:justify-between justify-center text-sm font-semibold rounded-md lg:px-4 py-2 hover:bg-gray-100';
    
    if ($active) {
        $classes .= ' bg-gray-100';
    }
    
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>

    {{ $slot }}
</a>
