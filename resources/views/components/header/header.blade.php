<header
    {{ $attributes->merge([
        'class' => '
                fixed top-0 left-0 w-full z-50 
                bg-gradient-to-r from-[#0A2C73] to-[#1A3C83] bg-opacity-95 
                text-white text-opacity-100 
                backdrop-blur-md shadow-md  
                dark:from-gray-900 dark:to-gray-800 dark:text-white dark:text-opacity-100
            ',
    ]) }}
    style="background-image: url('{{ asset('images/zhc_banner3.png') }}'); background-attachment: fixed;">

    <div class="container mx-auto flex items-center justify-between  ">
        <img src="{{ asset('images/smz.png') }}" alt="Government Logo" class="h-30 -mx-15">

        <div class="flex flex-col items-center">
            <h1
                class="text-lg md:text-xl font-semibold text-shadow-white text-opacity-10 text-center tracking-wide dark:text-white dark:text-opacity-100">
                Serikali ya Mapinduzi ya Zanzibar
            </h1>
            <h2
                class="text-2xl md:text-3xl font-bold text-shadow-white text-opacity-10 text-center tracking-wider uppercase mt-1 dark:text-white dark:text-opacity-100">
                Zanzibar Housing Corporation
            </h2>
        </div>

        <img src="{{ asset('images/zhc_logo.png') }}" alt="Zhc Logo" class="h-20 -mx-15">
    </div>
    <div class="bg-white/20 h-[.2vh] dark:bg-gray-700/40"></div>
</header>
