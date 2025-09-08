<div>
    {{-- @dd($slides); --}}
    <x-hero :slides="$slides"/>
    <x-announcement-news-wrapper :announcements="$announcementsValues" :news="$newsArray"/>
    <x-properties.properties-swiper  />

    <x-media :poster="$poster" :videos="$videosArray" />

    <x-services.service-swiper />
</div>
