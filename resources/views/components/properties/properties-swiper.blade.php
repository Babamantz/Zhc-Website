@props(['propertySwipers'])


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
    <div class="max-w-x12l mx-auto px-4 text-center ">
        <h2 class="text-2xl md:text-3xl font-bold text-yellow-600 mb-8">
            Properties
        </h2>

        <!-- Swiper -->
        <div class="swiper" x-ref="serviceSwiper">
            <div class="swiper-wrapper">
                @forelse ($propertySwipers as $property)
                    <div class="swiper-slide">
                        <div x-data="{ open: false }" class="relative">

                            <!-- Card -->
                            <a href="javascript:void(0)" @click="open = true" class="block group">
                                <div class="relative flex flex-col items-center justify-center h-64 p-6 text-white rounded-lg shadow-lg bg-cover bg-center"
                                    style="background-image: url('{{ $property['property'] }}');">

                                    <!-- Overlay -->
                                    <div class="absolute inset-0 bg-[#0A2C73]/30 rounded-lg"></div>

                                    <!-- Card Content -->
                                    <div class="relative z-10 flex flex-col items-center text-center">
                                        <h3 class="font-semibold text-lg mt-2">
                                            {{ $property['title'] ?? 'Portal' }}
                                        </h3>
                                    </div>
                                </div>
                            </a>

                            <!-- Zoom Modal Teleported -->
                            <template x-teleport="body">
                                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90"
                                    class="fixed inset-0 bg-black/70 flex items-center justify-center z-50"
                                    style="display: none;">

                                    <!-- Expanded Card -->
                                    <div @click.away="open = false" x-data="{ showContent: false }"
                                        class="relative bg-cover bg-center rounded-xl shadow-2xl w-11/12 max-w-3xl h-[80vh] p-8 text-white"
                                        style="background-image: url('{{ $property['property'] }}');">

                                        <!-- Dark overlay -->
                                        <div class="absolute inset-0 bg-[#0A2C73]/60 rounded-xl"></div>

                                        <!-- Close Button -->
                                        <button @click="open = false"
                                            class="absolute top-3 right-3 text-white hover:text-gray-300 text-2xl z-20">&times;
                                        </button>

                                        <!-- Toggle Button -->
                                        <div class="relative z-10">
                                            <button @click="showContent = !showContent"
                                                class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg text-sm font-medium">
                                                <span x-show="!showContent">Show Details</span>
                                                <span x-show="showContent">Hide Info</span>
                                            </button>
                                        </div>

                                        <!-- Only the Content (controlled by toggle) -->
                                        <div x-show="showContent" x-transition
                                            class="relative z-10 mt-6 p-4 bg-black/30 rounded-lg max-h-[60vh] overflow-y-auto">

                                            <h2 class="text-3xl font-bold mb-4">
                                                {{ $property['title'] }}
                                            </h2>
                                            <p class="text-base leading-relaxed">
                                                {!! $property['content'] !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </template>

                        </div>
                    </div>
                @empty
                    <p>No Property Found</p>
                @endforelse




            </div>

            <!-- Navigation and Pagination -->
            <div class="swiper-button-next text-[#0A2C73]" x-ref="next"></div>
            <div class="swiper-button-prev text-[#0A2C73]" x-ref="prev"></div>
            <div class="swiper-pagination mt-4" x-ref="pagination"></div>
        </div>
    </div>
</div>
