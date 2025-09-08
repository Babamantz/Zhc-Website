@props(['news'])

{{-- @dd($news[0]["images"][0]["medium"]) --}}

<div class="flex flex-col">
    {{-- Section header --}}
    <x-news.news-header/>
    

    <div class="lg:grid lg:grid-cols-2 lg:gap-2 flex flex-col mt-2">
        {{-- First column: teaser (first item in array) --}}
        @if (!empty($news))
            @php $teaser = $news[0]; @endphp
            <div class="mb-4 hidden md:block py-2">
                <x-news.news-teaser 
                    :img="$teaser['images'][0]['medium']"
                    :title="$teaser['title']" 
                    :date="$teaser['date']" 
                    :excerpt="$teaser['excerpt'] ?? null"
                />
            </div>
        @endif

        {{-- Second column: news list (remaining items) --}}
        <div class="grid-cols-1">
            @foreach ($news as $item)
                <x-news.news-item 
                    :image="$item['images'][0]['thumb']",
                    :title="$item['title']",
                    :date="$item['date']",
                    :excerpt="$item['excerpt'] ?? null",
                    :showExcerpt="true" 
                />
            @endforeach

            <div class="flex justify-start">
                <a href="/news"
                    class="md:mt-4 text-base text-yellow-600 border-b-2 border-transparent hover:border-black-active hover:text-black-active">
                    View More <span><i class="fa fa-arrow-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>
