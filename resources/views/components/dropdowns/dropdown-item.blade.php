@props(['active' => false])

@php
    $classes = 'flex items-center lg:justify-between justify-center text-sm lg:px-4 py-1 bg-none hover:bg-gray-700 hover:text-white';
    
    if ($active) {
        $classes .= ' bg-gray-700 text-white';
    }
    
@endphp
<a {{ $attributes(['class' => $classes]) }}>

    {{ $slot }}
</a>
