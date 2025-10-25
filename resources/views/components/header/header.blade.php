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
    <div class="container mx-auto flex  items-center justify-between  px-4">

        <!-- Left Logo -->
        <img src="{{ asset('images/smz.png') }}" alt="Government Logo" class="flex h-16  md:h-20 lg:h-30 md:-mx-15">

        <!-- Center Titles -->
        <div class=" hidden md:flex flex-col items-center text-center">
            <h1
                class="text-base md:text-xl font-semibold text-shadow-white text-opacity-10 tracking-wide dark:text-white dark:text-opacity-100">
                The Revolutionary Government of Zanzibar
            </h1>
            <h2
                class="text-xl md:text-2xl lg:text-3xl font-bold text-shadow-white text-opacity-10 tracking-wider uppercase mt-1 dark:text-white dark:text-opacity-100">
                Zanzibar Housing Corporation
            </h2>
        </div>

        <!-- Right Logo -->
        <img src="{{ asset('images/zhc_logo.png') }}" alt="Zhc Logo" class="flex h-16 md:h-20 lg:h-20 md:-mx-15">
    </div>


    <div class="bg-white/20 h-[.2vh] dark:bg-gray-700/40"></div>
</header>
