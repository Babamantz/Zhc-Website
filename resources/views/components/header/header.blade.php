{{-- <header
    {{ $attributes->merge(['class' => 'fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-[#0A2C73]/95 to-[#1A3C83]/95 text-white/90 backdrop-blur-md shadow-md']) }}>
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
        <img src="{{ asset('images/smz.png') }}" alt="Government Logo" class="h-20">

        <div class="flex flex-col items-center">
            <h1 class="text-lg md:text-xl font-semibold text-white/90 text-center tracking-wide">
                Serikali ya Mapinduzi ya Zanzibar
            </h1>
            <h2 class="text-2xl md:text-3xl font-bold text-white/90 text-center tracking-wider uppercase mt-1">
                Zanzibar Housing Corporation
            </h2>
        </div>

        <img src="{{ asset('images/zhc_logo.png') }}" alt="Zhc LOGo" class="h-20">
    </div>
    <div class="bg-white/20 h-[.2vh]"></div>
</header> --}}

<!-- Add padding-top to avoid content hiding behind fixed header -->
{{-- <div class="pt-2"></div> --}}

<header
    {{ $attributes->merge([
        'class' =>
            'fixed top-0 left-0 w-full z-50 bg-[#0A2C73] bg-gradient-to-r from-[#0A2C73] to-[#1A3C83] bg-opacity-95 text-white/90 backdrop-blur-md shadow-md',
    ]) }}>
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
        <img src="{{ asset('images/smz.png') }}" alt="Government Logo" class="h-20">

        <div class="flex flex-col items-center">
            <h1 class="text-lg md:text-xl font-semibold text-white/90 text-center tracking-wide">
                Serikali ya Mapinduzi ya Zanzibar
            </h1>
            <h2 class="text-2xl md:text-3xl font-bold text-white/90 text-center tracking-wider uppercase mt-1">
                Zanzibar Housing Corporation
            </h2>
        </div>

        <img src="{{ asset('images/zhc_logo.png') }}" alt="Zhc Logo" class="h-20">
    </div>
    <div class="bg-white/20 h-[.2vh]"></div>
</header>
