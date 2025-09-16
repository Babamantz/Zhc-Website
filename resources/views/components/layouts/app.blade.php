<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Font Awesome 6 Free (latest) -->
<style>
     [x-cloak] { display: none !important; }
</style>

    <title>{{ $title ?? 'Zanzibar Housing Corporation' }}</title>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 m-0 p-0">

    <x-header.header class="fixed top-0 left-0 w-full z-50" />
    
    <x-header.navbar class="fixed top-[110px] left-0 w-full z-40" />


    <main class="mx-auto pt-[150px]">
        {{ $slot }}
    </main>


    <x-footer.footer-wrapper />

 @stack('scripts')

</body>

</html>
