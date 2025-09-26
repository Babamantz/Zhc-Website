@php
    $data = [
        [
            'href' => '/news/tax-symposium-attracts-stakeholders',
            'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/TRA-4A5A1397.JPG',
            'title' => 'TAX SYMPOSIUM ATTRACTS STAKEHOLDERS',
            'date' => '10 May, 2025',
            'excerpt' => 'Taxpayers who participated in the Tax symposium held on May 8, 2025, in Dar es Salaam...',
        ],
        [
            'href' => '/news/commissioner-general-mwenda-visits-the-speaker-of-tanzania-parliament',
            'img' =>
                'https://www.tra.go.tz/images/uploads/news/featured_image/WhatsApp_Image_2025-05-06_at_11.12.19.jpeg',
            'title' => 'COMMISSIONER GENERAL MWENDA VISITS THE SPEAKER OF TANZANIA PARLIAMENT',
            'date' => '06 May, 2025',
        ],
        [
            'href' => '/news/tra-board-meeting',
            'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/Picture_1.jpg',
            'title' => 'TRA BOARD MEETING',
            'date' => '09 April, 2025',
        ],
        [
            'href' => '/news/deputy-chief-qadi-pass-on-the-culture-of-paying-taxes-to-your-children',
            'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/0T5A8922.jpg',
            'title' => 'DEPUTY CHIEF QADI: “PASS ON THE CULTURE OF PAYING TAXES TO YOUR CHILDREN”',
            'date' => '17 March, 2025',
        ],
    ];

@endphp

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
                <div class="text-sm md:text-base mx-2">


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
        <div class="hidden md:col-span-4">
            <x-news.news-header />

            @foreach ($newsArray as $item)
                <div class="mb-4 mt-2">
                    <div class="flex items-start gap-4 mb-4">
                        <!-- Image Section -->
                        <a href="{{ route('news.show', ['id' => $item['id']]) }}" class="w-32 h-20 flex-shrink-0">
                            <img src="{{ $item['images'][0]['original'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-full object-cover rounded-md" />
                        </a>

                        <!-- Content Section -->
                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['id' => $item['id']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] }}
                            </a>
                            <div class="text-sm text-gray-600 mt-1 flex items-center">
                                <i class="fa fa-calendar mr-1 text-gray-500"></i> {{ $item['date'] }}
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
