

<header {{ $attributes->merge(['class' => 'bg-[#0A2C73] text-white shadow-md']) }}>

    <div class="container mx-auto flex items-center justify-between py-4 px-6">
        <img src="{{ asset('images/zhc-logo.png') }}" alt="ZHC Logo" class="h-12">

        <div class="flex flex-col items-center">

            <h1 class="text-lg md:text-xl font-semibold text-white text-center tracking-wide">
                Serikali ya Mapinduzi Zanzibar
            </h1>

            <h2 class="text-2xl md:text-3xl font-bold text-white text-center tracking-wider uppercase mt-1">
                Zanzibar Housing Corporation
            </h2>
        </div>


        <div class="w-12 h-12">
            <img src="{{ asset('images/zhc-logo.png') }}" alt=" Logo" class="h-12">
        </div> {{-- Placeholder for symmetry if no right logo --}}
    </div>
    <div class="bg-white h-[1.1vh]"></div>
</header>
