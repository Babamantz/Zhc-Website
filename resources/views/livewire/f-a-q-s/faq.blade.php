<div class="flex  flex-col">
    <x-page-header title="FREQUENTLY ASKED QUESTIONS" />

    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}
            <h1 class="text-2xl font-bold  border-b-2">FAQs</h1>


            <div class="flex flex-col">
                <div class="text-sm md:text-base my-3 mx-2">

                    {{-- @dd($faqsArray); --}}

                    <div x-data="{ open: 0 }" class="space-y-4">
                        @foreach ($faqsArray as $index => $faq)
                            <div class="border rounded-lg shadow-sm">
                                <button @click="open === {{ $index }} ? open = null : open = {{ $index }}"
                                    class="w-full flex justify-between items-center px-4 py-3 bg-[#0A2C73] text-white"
                                    hover:bg-gray-200 font-medium">
                                    <span>{{ $faq['header'] }}</span>
                                    <span x-text="open === {{ $index }} ? '-' : '+'"></span>
                                </button>
                                <div x-show="open === {{ $index }}" x-collapse
                                    class="px-4 py-3 border-t bg-white">
                                    {!! $faq['content'] !!}
                                </div>
                            </div>
                        @endforeach
                    </div>





                </div>
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
                            <img src="{{ $item['images'][0]['original'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-full object-cover rounded-md" />
                        </a>

                        <!-- Content Section -->
                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] }}
                            </a>
                            <div class="text-sm text-gray-600 mt-1 flex items-center">
                                <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                {{ \Carbon\Carbon::parse($item['date'])->format('d M, Y') }}
                            </div>

                            {{-- Optional excerpt --}}
                            {{-- @if (!empty($item['excerpt']))
                                <p class="text-xs text-gray-500 mt-2">
                                    {{ $item['excerpt'] }}
                                </p>
                            @endif --}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
