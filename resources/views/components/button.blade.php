@props([
    'color' => 'dark',
])

@php
    $options = [
        'dark'      => 'bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900 focus:ring-gray-300',
        'orange'    => 'bg-orange-500 hover:bg-orange-600 active:bg-orange-700 focus:border-orange-700 focus:ring-orange-300',
        'success'   => 'bg-emerald-800 hover:bg-emerald-700 active:bg-emerald-900 focus:border-emerald-900 focus:ring-emerald-300',
        'danger'    => 'bg-red-800 hover:bg-red-700 active:bg-red-900 focus:border-red-900 focus:ring-red-300',
        'info'      => 'bg-sky-800 hover:bg-sky-700 active:bg-sky-900 focus:border-sky-900 focus:ring-sky-300',
    ];
    $style = $options[$color] ?? $options['dark'];
@endphp

<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => "$style inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition"]) }}
>
    {{ $slot }}
</button>
