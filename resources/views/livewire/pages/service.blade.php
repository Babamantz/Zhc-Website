<div class="flex  flex-col">
    <x-page-header title="SERVICES" />

    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}
            <h1 class="text-2xl font-bold  border-b-2">Services</h1>


            <div class="flex flex-col">
                <div class="text-sm md:text-base py-3 mx-2">
                    <x-services :services="$servicesArray" />

                    
                </div>
            </div>
        </div>


        {{-- Right column: col-span-2 --}}

        <div class="mt-8 lg:mt-0 lg:col-span-4">
            <x-news.news-header />


            @foreach ($newsArray as $item)
                <div class="mb-4 mt-2">
                    <div class="flex items-start gap-4 mb-4">
                        <!-- Image Section -->
                        <a href="{{ route('news.show', ['news' => $item['slug']]) }}" class="w-32 h-20 flex-shrink-0">
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
                                    {{ \Carbon\Carbon::parse($item['date'])->format('d M, Y') }}
                                @endunless
                            </div>

                            {{-- Optional excerpt --}}
                            {{-- @unless (empty($item['excerpt']))
                                <p class="text-xs text-gray-500 mt-2">
                                    {!! $item['excerpt'] !!}
                                </p>
                            @endunless --}}
                        </div>
                    </div>
                </div>
            @endforeach


        </div>


    </div>
</div>
