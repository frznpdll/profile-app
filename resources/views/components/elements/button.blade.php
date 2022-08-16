@props([
    'theme' => '',
    'id' => '',
    'state' => 'deactivate',
    'name' => '',
    'class' => ''
])

@php
    if(!function_exists('getThemeClassForButton')) {
        function getThemeClassForButton($theme) {
        return match ($theme) {
            'gray' => 'inline-flex text-white bg-gray-500 focus:border-gray-400 hover:bg-gray-600 focus:ring-gray-500',
            'blue' => 'inline-flex text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500',
            'green' => 'inline-flex text-white bg-green-500 focus:border-green-400 hover:bg-green-600 focus:ring-green-500',
            'red' => 'inline-flex text-white bg-red-500 focus:bordeg-red-400 hover:bg-red-600 focus:ring-red-500',
            'yellow' => 'inline-flex text-white bg-yellow-500 focus:bordeg-yellow-400 hover:bg-yellow-600 focus:ring-yellow-500',
            'cyan' => 'inline-flex text-white bg-cyan-500 hover:bg-cyan-600 focus:ring-cyan-500',
            'indigo' => 'inline-flex text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-indigo-500',
        };
    }
    }
@endphp

<button id="{{ $id }}" name="{{ $name }}" class="justify-center border py-2 px-4 my-auto mx-3 border-transparent shadow-sm font-medium rounded-md focus-outline-none focus:ring-2 focus:fing-offset-2 {{ getThemeClassForButton($theme) }} {{ $state }} {{ $class }}">
    {{ $slot }}
</button>