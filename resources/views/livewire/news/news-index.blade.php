<div class="flex flex-col">
    <x-page-header title="NEWS" />
    <div class="lg:grid lg:grid-cols-11 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">



        {{-- Left column: col-span-10  --}}
        <div class="lg:col-span-6">
            <h1 class="text-2xl font-bold  border-b-2">News</h1>

            {{-- Loop through news items --}}

            @foreach ($newsArray as $item)
            {{-- @dd($item['slug']) --}}
                <div class="mb-4 mt-2">
                    <div class="flex items-start mt-5 gap-4 mb-4">
                        <!-- Image Section -->
                        <a href="{{ route('news.show', ['news' => $item['slug']]) }}" class="w-60 h-30 flex-shrink-0">
                            @unless (empty($item['images'][0]['original']))
                                <img src="{{ $item['images'][0]['original'] }}" alt="{{ $item['title'] ?? 'News Image' }}"
                                    class="w-full h-full object-cover rounded-md" />
                            @endunless
                        </a>

                        <!-- Content Section -->
                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] ?? 'Untitled News' }}
                            </a>

                            <div class="text-sm text-gray-600 mt-1 flex items-center">
                                <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                @unless (empty($item['date']))
                                    {{ \Carbon\Carbon::parse($item['date'])->format('d M ,Y') }}
                                @endunless
                            </div>

                            {{-- Optional excerpt --}}
                            @unless (empty($item['excerpt']))
                                <p class=" text-gray-500 mt-2">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($item['excerpt']), 80) !!}
                                </p>
                            @endunless
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mt-6">
                {{ $newsList->links() }}
            </div>
        </div>

        {{-- <x-vertical-line thickness="2" color="black" /> --}}

        {{-- Right column: col-span-2 --}}

        <div class="hidden lg:block lg:col-span-4">
            <x-announcements.announcement-section :announcements="$announcementsValues" />

        </div>
    </div>

</div>
