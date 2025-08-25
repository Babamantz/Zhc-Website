@php
    $videos = [
        'https://www.youtube.com/watch?v=BYc5HHpAIb4',
        'https://www.youtube.com/watch?v=my74ThOExlM',
        'https://www.youtube.com/watch?v=Gh24NQkkIVU',
        'https://www.youtube.com/watch?v=hNfN4NXjflg',
        'https://www.youtube.com/watch?v=ADhz7NMmdr4',
    ];

    // Convert to embed format
    $embedVideos = array_map(function($url) {
        return str_replace('watch?v=', 'embed/', $url);
    }, $videos);
@endphp


<div class="bg-gradient-to-br from-slate-50 to-slate-100 p-8 rounded-2xl shadow-xl" x-data="{ open: false }">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Left Column: Video Upload Placeholder -->
     <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center">
      <div class="w-full aspect-[3/2] bg-slate-200 rounded-lg flex items-center justify-center text-slate-500">
        Poster Placeholder
      </div>
    </div>
  

    <!-- Right Column: Poster Placeholder -->
      {{-- <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col gap-4"> --}}


      <!-- Video Placeholder -->
      {{-- <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"> --}}

         <x-youtube-swiper :videos="$embedVideos" />

      {{-- </div> --}}
    {{-- </div> --}}
   
    
  </div>
</div>
