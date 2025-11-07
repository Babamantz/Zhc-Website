<div>
    <x-hero :slides="$slides" />
    <x-announcement-news-wrapper :announcements="$announcementsValues" :news="$newsArray" />
    <x-properties.properties-swiper :$propertySwipers />

    <x-media :poster="$poster" :videos="$videosArray" />

    <x-services.service-swiper :services="$onlineServices" />
    <x-call-centre />
</div>
