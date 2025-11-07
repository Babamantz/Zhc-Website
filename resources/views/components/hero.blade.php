@props(['slides'])

{{-- @dd($slides) --}}
@php
    $slidesData = collect($slides)
        ->map(function ($slide) {
            return [
                'title' => $slide['title'] ?? '',
                'description' => $slide['description'] ?? '',
                'img' => $slide['images'][0] ?? '', // take first image
            ];
        })
        ->toArray();
@endphp

{{-- @dd($slidesData[0]['img']) --}}

<div class="w-full mt-4" x-data="carousel({{ Js::from($slidesData) }})" x-init="start()" @mouseenter="pause()" @mouseleave="resume()">

    <div class="relative w-full h-[calc(100vh-64px)] overflow-hidden">


        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="current === index" x-transition:enter="transition transform ease-out duration-700"
                x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
                x-transition:leave="transition transform ease-in duration-500"
                x-transition:leave-start="translate-x-0 opacity-100"
                x-transition:leave-end="-translate-x-full opacity-0" class="absolute inset-0 bg-cover bg-center"
                :style="`background-image: url('${slide.img}')`">
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
            <button @click="goToSlide(index)" :class="current === index ? 'bg-white' : 'bg-gray-400'"
                class="w-4 h-4 rounded-full transition duration-300">
            </button>
        </template>
    </div>
</div>

<script>
    function carousel(slidesData) {

        console.log(slidesData[0].img);

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
