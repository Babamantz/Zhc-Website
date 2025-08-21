

<!-- Swiper container -->
<div x-data>
  <div class="swiper mySwiper">
    <div class="swiper-wrapper  flex items-center justify-center">
      @foreach ($videos as $video)
        <div class="swiper-slide swiper-slide flex items-center justify-center">
          <div class="w-full aspect-[4/4 ] rounded-lg overflow-hidden shadow-md  flex items-center justify-center">
            <iframe 
              class="w-full h-full object-cover  flex items-center justify-center" 
              src="{{ $video }}" 
              title="YouTube video"
              frameborder="0"
              allowfullscreen>
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
<!-- Initialize Swiper -->
@once
  @push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      new Swiper(".mySwiper", {
        slidesPerView: 1,  // one video in focus by default
        spaceBetween: 20,
        loop: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: { slidesPerView: 1 },   // Mobile
          768: { slidesPerView: 2 },   // Tablet
          1024: { slidesPerView: 3 },  // Desktop
        },
      });
    });
  </script>
  @endpush
@endonce
