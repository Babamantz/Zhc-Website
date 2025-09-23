{{-- @dd($services) --}}
<div class="w-full py-12 bg-white" x-data x-init="new Swiper($refs.serviceSwiper, {
    loop: true,
    spaceBetween: 30,
    navigation: {
        nextEl: $refs.next,
        prevEl: $refs.prev,
    },
    pagination: {
        el: $refs.pagination,
        clickable: true,
    },
    breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
    }
});">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <h2 class="text-2xl md:text-3xl font-bold text-yellow-600 mb-8">
            Services
        </h2>
        <!-- Swiper -->
        <div class="swiper" x-ref="serviceSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->

                @forelse ($services as $service)
                    <div class="swiper-slide">
                        <a href="{{ $service['title'] }}" target="_blank" class="block group">
                            <div
                                class="flex flex-col items-center justify-center p-6 rounded-lg shadow-lg text-white transition-transform hover:scale-105 relative overflow-hidden">
                                {{-- Background --}}
                                <div class="absolute inset-0 bg-cover bg-center opacity-60 group-hover:opacity-80 transition"
                                    style="background-image: url('')"></div>

                                {{-- Overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-r from-[#0A2C73] to-[#1A3C83] bg-opacity-95 mix-blend-multiply"></div>

                                {{-- Content --}}
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-28 h-32 flex items-center justify-center">
                                        <img src="{{ $service['logo'] }}" alt="{{ $service['alt'] }}"
                                            class="w-60 h-60 object-contain">
                                    </div>
                                    <h3 class="font-semibold text-lg mt-2 text-center">{{ $service['alt'] }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>No Content</p>
                @endforelse



            </div>

            <!-- Navigation and Pagination -->
            <div class="swiper-button-next text-[#0A2C73]" x-ref="next"></div>
            <div class="swiper-button-prev text-[#0A2C73]" x-ref="prev"></div>
            <div class="swiper-pagination mt-4" x-ref="pagination"></div>
        </div>
    </div>
</div>
