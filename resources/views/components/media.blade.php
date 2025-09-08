@props(['videos'])
@php
    $videos = $videos->toArray();

    $embedVideos = array_map(function ($url) {
        return str_replace('watch?v=', 'embed/', $url);
    }, $videos);

@endphp
@props(['poster'])
<div class="bg-gradient-to-br from-slate-50 to-slate-100 p-8 rounded-2xl shadow-xl" x-data="{ open: false }">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col items-center justify-center">
          <div class="w-full aspect-[3/2] rounded-lg overflow-hidden bg-cover bg-center" 
           style="background-image: url('{{ $poster}}');;">
         </div>
        </div


        <x-youtube-swiper :videos="$embedVideos" />



    </div>
</div>
