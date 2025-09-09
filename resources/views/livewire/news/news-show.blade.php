<div class="flex flex-col">
    <x-page-header title="NEWS" />
    <div class="lg:grid lg:grid-cols-11 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        

    {{-- Left column: col-span-10  --}}
    <div class="lg:col-span-6">

        {{-- Loop through news items --}}
            <div class="mb-4">
                <div class="flex items-start gap-4 mb-4">
                    <!-- Image Section -->
                    <a href="{{ route('news.show',["id"=>$news['id']]) }}" class="w-32 h-20 flex-shrink-0">
                        <img src="{{ $news['images'][0]['original'] }}" alt="{{ $news['title'] }}" class="w-full h-full object-cover rounded-md" />
                    </a>

                    <!-- Content Section -->
                    <div class="flex flex-col justify-center">
                        <a href="{{ route('news.show',["id"=>$news['id']]) }}" class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                            {{ $news['title'] }}
                        </a>
                        <div class="text-sm text-gray-600 mt-1 flex items-center">
                            <i class="fa fa-calendar mr-1 text-gray-500"></i> {{ $news['date'] }}
                        </div>

                        {{-- Optional excerpt --}}
                        @if(!empty($news['excerpt']))
                            <p class="text-xs text-gray-500 mt-2">
                                {{ $news['excerpt'] }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

    </div>
    
     {{-- <x-vertical-line thickness="2" color="black" /> --}}

     {{-- Right column: col-span-2 --}}
        <div class="lg:col-span-4">
            <x-announcements.announcement-section :announcements="$announcementsValues"/>

        </div>
</div>
</div>