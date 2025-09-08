@php
$data = [
    [
        'href' => '/news/tax-symposium-attracts-stakeholders',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/TRA-4A5A1397.JPG',
        'title' => 'TAX SYMPOSIUM ATTRACTS STAKEHOLDERS',
        'date' => '10 May, 2025',
        'excerpt' => 'Taxpayers who participated in the Tax symposium held on May 8, 2025, in Dar es Salaam...'
    ],
    [
        'href' => '/news/commissioner-general-mwenda-visits-the-speaker-of-tanzania-parliament',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/WhatsApp_Image_2025-05-06_at_11.12.19.jpeg',
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
    <x-page-header title="SERVICES" />

    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}

            <div class="flex flex-col">
            <div class="text-sm md:text-base mx-2">
                
               <x-services :services="$servicesArray" />
                
               
                  
            </div>
            </div>
        </div>
        

        {{-- Right column: col-span-2 --}}
        <div class="lg:col-span-4">
    <x-news.news-header/>

            <x-news.section :data="$data" title="Recent Updates" :grid="false">
                <x-slot:items>
                    @foreach($data as $item)
                        <x-news.news-item 
                            :url="$item['href']" 
                            :image="$item['img']" 
                            :title="$item['title']" 
                            :date="$item['date']"
                        >
                            {{ $item['excerpt'] ?? '' }}
                        </x-news.news-item>
                    @endforeach
                </x-slot:items>
            </x-news.section>
        </div>

    </div>
</div>
