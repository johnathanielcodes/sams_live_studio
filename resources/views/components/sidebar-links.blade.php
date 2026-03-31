@props(['active' => false])

@php
    $classes = $active
        ? 'flex items-center gap-3 dark:text-black text-black  px-4 py-3 text-[#FF8F20] bg-white/100 rounded-lg transition group'
        : 'flex items-center gap-3 text-[#FF8F20] px-4 py-3 hover:text-[#FF8F20] hover:bg-white/5 bg-white/5 rounded-lg transition group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
