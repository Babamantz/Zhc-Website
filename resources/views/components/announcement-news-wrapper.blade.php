@props(['announcements','news'])

<section class="py-4">
  <div class="container px-4 mx-auto">
    <div class="lg:grid lg:grid-cols-3 lg:gap-8 xs:flex xs:flex-col">
      <!-- News -->
      <div class="col-span-2 mb-8">
        <x-news.news-card :news="$news" />
      </div>
      <!-- Announcements -->
      <div class="py-8 md:py-0">
        <x-announcements.announcement-section :announcements="$announcements"/>
      </div>
    </div>
  </div>
</section>



