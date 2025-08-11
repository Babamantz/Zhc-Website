
@props(['title'])

<div class="bg-white shadow-sm p-4 rounded mb-5">
    <h3 class="font-bold text-lg mb-3">{{ $title }}</h3>
    {{ $slot }}
</div>