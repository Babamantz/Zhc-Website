<div class="flex  flex-col">
    <x-page-header title="Directors Message" />

    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">



        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}
            {{-- <h1 class="text-3xl font-bold p-1 ">Organization Structure</h1> --}}

            <h2 class="text-2xl font-bold mb-6 border-b-2 ">Director's Message</h2>

            <!-- Content Section -->
            <div class="text-gray-700 leading-relaxed">

                {{-- @dd($directorMessage->getFirstMediaUrl()); --}}

                <!-- Floating Photo -->
                @unless (empty($directorMessage) || !$directorMessage->getFirstMediaUrl())
                    <img src="{{ url($directorMessage->getFirstMediaUrl()) }}" alt="Director Photo" loading="lazy"
                        class="w-48 h-55 object-cover rounded-lg shadow-md float-left mr-4 mb-3">
                @endunless



                <!-- Message -->
                {{-- <h3 class="text-xl font-semibold mb-3">Welcome</h3> --}}

                @unless (empty($directorMessage['content']))
                    {!! $directorMessage['content'] !!}
                @else
                    <p class="text-gray-500 italic">No message available.</p>
                @endunless




                <!-- Clear float -->
                <div class="clear-both"></div>
            </div>


        </div>


        {{-- Right column: col-span-2 --}}

        <div class="hidden lg:block lg:col-span-4">
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

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
