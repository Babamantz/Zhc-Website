@props(['href', 'img', 'title', 'date', 'excerpt'])
<div class="relative overflow-hidden bg-no-repeat bg-cover shadow-lg rounded-md news-item-hover h-96">
  <a href="{{ $href }}">
    <img src="{{ $img }}" class="object-cover object-top rounded-md w-full h-96" />
  </a>
  <a href="{{ $href }}">
    <div class="absolute bottom-0 left-0 w-full h-full bg-black/30">
      <div class="flex justify-start items-end h-full">
        <div class="text-white p-4 bg-black/75">
          <p class="md:uppercase font-bold text-sm md:text-base mb-2">{{ $title }}</p>
          <div class="flex justify-between mb-3 text-sm">
            <div><i class="fa fa-calendar"></i> {{ $date }}</div>
          </div>
          <p class="hidden md:block">{{ $excerpt }}</p>
        </div>
      </div>
    </div>
  </a>
</div>
