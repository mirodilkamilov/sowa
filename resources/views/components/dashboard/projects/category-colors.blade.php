@props(['category', 'index'])

@php
    $colors = [
        'primary',
        'success',
        'warning',
        'info',
        'secondary',
        'dark',
        'light',
        'danger',
    ];
@endphp

<div class="chip chip-{{ $colors[$index] }}">
    <div class="chip-body">
        <div class="chip-text text-center">{{ $category }}</div>
    </div>
</div>
