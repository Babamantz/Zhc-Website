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
            ZHC Online Services
        </h2>

        <!-- Swiper -->
        <div class="swiper" x-ref="serviceSwiper">
            <div class="swiper-wrapper">

                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <a href="" target="_blank" class="block group">
                        <div
                            class="flex flex-col items-center justify-center p-6 bg-[#0A2C73] text-white rounded-lg shadow-lg transition-transform hover:scale-105">
                            <div class="relative w-28 h-32 mb-4">
                                <div class="absolute inset-0 bg-cover bg-center opacity-70 rounded-md"
                                    style="background-image: url('https://www.tira.go.tz/uploads/services/a4e9a3a9a6d71c0a2440aab1d42e62ca.jpeg'); clip-path: polygon(50% 0%, 93% 25%, 93% 75%, 50% 100%, 7% 75%, 7% 25%);">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <img src="https://www.tira.go.tz/uploads/services/icon-1659878969" alt="ORS Icon"
                                        class="w-10 h-10">
                                </div>
                            </div>
                            <h3 class="font-semibold text-lg mt-2">Portal</h3>
                        </div>
                    </a>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <a href="" target="_blank" class="block group">
                        <div
                            class="flex flex-col items-center justify-center p-6 bg-[#0A2C73] text-white rounded-lg shadow-lg transition-transform hover:scale-105">
                            <div class="relative w-28 h-32 mb-4">
                                <div class="absolute inset-0 bg-cover bg-center opacity-70 rounded-md"
                                    style="background-image: url('https://www.tira.go.tz/uploads/services/a4e9a3a9a6d71c0a2440aab1d42e62ca.jpeg'); clip-path: polygon(50% 0%, 93% 25%, 93% 75%, 50% 100%, 7% 75%, 7% 25%);">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <img src="https://www.tira.go.tz/uploads/services/icon-1659885934" alt="RBS Icon"
                                        class="w-10 h-10">
                                </div>
                            </div>
                            <h3 class="font-semibold text-lg mt-2">ZHC Online Portal</h3>
                        </div>
                    </a>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <a href="" target="_blank" class="block group">
                        <div
                            class="flex flex-col items-center justify-center p-6 bg-[#0A2C73] text-white rounded-lg shadow-lg transition-transform hover:scale-105">
                            <div class="relative w-28 h-32 mb-4">
                                <div class="absolute inset-0 bg-cover bg-center opacity-70 rounded-md"
                                    style="background-image: url(''); clip-path: polygon(50% 0%, 93% 25%, 93% 75%, 50% 100%, 7% 75%, 7% 25%);">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <img src="https://www.tira.go.tz/uploads/services/icon-1659878879" alt="MIS Icon"
                                        class="w-10 h-10">
                                </div>
                            </div>
                            <h3 class="font-semibold text-lg mt-2">Portal</h3>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Navigation and Pagination -->
            <div class="swiper-button-next text-[#0A2C73]" x-ref="next"></div>
            <div class="swiper-button-prev text-[#0A2C73]" x-ref="prev"></div>
            <div class="swiper-pagination mt-4" x-ref="pagination"></div>
        </div>
    </div>
</div>
