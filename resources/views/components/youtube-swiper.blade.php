<!-- Swiper container -->
<div x-data class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center w-full">
    <div class="w-full aspect-[3/2] bg-slate-200 rounded-lg flex items-center justify-center text-slate-500">

        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
                @foreach ($videos as $video)
                    <div class="swiper-slide flex items-center justify-center w-full h-full">
                        <div class="w-full h-full rounded-lg overflow-hidden shadow-md">
                            <iframe class="w-full h-full object-cover"
                                src="{{ $video }}" title="YouTube video" frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Pagination dots -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<!-- Initialize Swiper -->
@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new Swiper(".mySwiper", {
                    slidesPerView: 1, // only one video visible
                    spaceBetween: 0, // no gaps
                    loop: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    }
                });
            });
        </script>
    @endpush
@endonce
