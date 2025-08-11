<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <title>{{ $title ?? 'Zanzibar Housing Corporation' }}</title>
    <script src="//unpkg.com/alpinejs" defer></script>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 text-gray-900 m-0 p-0">

    <x-header class="fixed top-0 left-0 w-full z-50" />
    
    <x-navbar class="fixed top-[110px] left-0 w-full z-40" />


    <main class="mx-auto pt-[150px]">
        {{ $slot }}
    </main>


    <x-footer.main />


</body>

</html>
