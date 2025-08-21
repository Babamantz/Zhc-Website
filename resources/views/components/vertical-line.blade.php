@props([
    'thickness' => '1',   // Tailwind border size (1, 2, 4, 8, etc.)
    'color' => 'gray-800' // Tailwind color (gray-800, black, red-500, etc.)
])

<div class="h-full border-l-{{ $thickness }} border-{{ $color }}"></div>
