<!-- resources/views/components/footer/heading.blade.php -->
@props(['title'])

<h6 class="text-white uppercase font-bold mb-4 relative">
    {{ $title }}
    <div class="absolute bottom-0 left-0 w-full h-1 flex">
        <div class="w-1/3 h-full bg-secondary"></div>
        <div class="w-2/3 h-full bg-primary"></div>
    </div>
</h6>
