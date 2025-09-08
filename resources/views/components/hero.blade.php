@props(['slides'])

@php
$slidesData = collect($slides)->map(function ($slide) {
    return [
        'title' => $slide['title'] ?? '',
        'description' => $slide['description'] ?? '',
        'img' => $slide['images'][0] ?? '', // take first image
    ];
})->toArray();
@endphp

<div class="w-full" 
     x-data="carousel({{ Js::from($slidesData) }})" 
     x-init="start()" 
     @mouseenter="pause()" 
     @mouseleave="resume()">

    <div class="relative w-full h-[calc(100vh-64px)] overflow-hidden">

        <!-- Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="current === index"
                x-transition:enter="transition transform ease-out duration-700"
                x-transition:enter-start="translate-x-full opacity-0"
                x-transition:enter-end="translate-x-0 opacity-100"
                x-transition:leave="transition transform ease-in duration-500"
                x-transition:leave-start="translate-x-0 opacity-100"
                x-transition:leave-end="-translate-x-full opacity-0"
                class="absolute inset-0 bg-cover bg-center"
                :style="`background-image: url(${slide.img});`">

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                <!-- Text Content -->
                <div class="relative z-10 flex items-center justify-center h-full text-center text-white px-4">
                    <div class="max-w-2xl">
                        <h1 class="text-4xl md:text-5xl font-bold" x-text="slide.title"></h1>
                        <p class="mt-4 text-lg md:text-xl" x-text="slide.description"></p>
                        <a :href="slide.link ?? '#'"
                           target="_blank"
                           class="inline-block mt-6 bg-white text-[#0A2C73] px-6 py-3 rounded-lg text-lg hover:bg-gray-100 transition">
                            Explore
                        </a>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Arrows -->
    <button @click="prev()"
        class="absolute top-1/2 left-4 transform -translate-y-1/2 z-20 text-white bg-black bg-opacity-30 p-2 rounded-full hover:bg-opacity-50">
        &#10094;
    </button>
    <button @click="next()"
        class="absolute top-1/2 right-4 transform -translate-y-1/2 z-20 text-white bg-black bg-opacity-30 p-2 rounded-full hover:bg-opacity-50">
        &#10095;
    </button>

    <!-- Dots -->
    <div class="absolute inset-x-0 bottom-6 flex justify-center gap-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="goToSlide(index)" 
                    :class="current === index ? 'bg-white' : 'bg-gray-400'"
                    class="w-4 h-4 rounded-full transition duration-300">
            </button>
        </template>
    </div>
</div>

<script>
    function carousel(slidesData) {
        return {
            current: 0,
            interval: null,
            slides: slidesData,
            start() {
                this.interval = setInterval(() => this.next(), 5000);
            },
            pause() {
                clearInterval(this.interval);
            },
            resume() {
                this.start();
            },
            next() {
                this.current = (this.current + 1) % this.slides.length;
            },
            prev() {
                this.current = (this.current - 1 + this.slides.length) % this.slides.length;
            },
            goToSlide(index) {
                this.current = index;
            }
        };
    }
</script>
