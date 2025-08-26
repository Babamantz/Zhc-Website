
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
    <x-page-header title="Directors Message" />

    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">
        

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}
  
<h2 class="text-2xl font-bold mb-6 border-b-2 ">Director's Message</h2>

    <!-- Content Section -->
    <div class="text-gray-700 leading-relaxed">
        
        <!-- Floating Photo -->
        <img 
            src="{{ asset('images/director.jpg') }}" 
            alt="Director Photo" 
            class="w-40 h-48 object-cover rounded-lg shadow-md float-left mr-4 mb-3"
        >

        <!-- Message -->
        <h3 class="text-xl font-semibold mb-3">Welcome</h3>
        <p class="mb-3">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, 
            nunc non facilisis vestibulum, metus urna vehicula urna, nec dapibus 
            neque sem nec mauris.
        </p>
        <p class="mb-3">
            Vivamus scelerisque, urna sit amet lacinia cursus, orci orci interdum 
            lacus, eget tempus ex augue non odio. Donec nec suscipit odio.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Sed euismod, nunc non facilisis vestibulum, metus urna vehicula 
                urna, nec dapibus neque sem nec mauris.
                jfdnfvnjfnvjnfvnfjnvjfnvjnfjvnfjnvfjnvjf
                kndcndnjnfvfnvjnfnvjfnfvfnvfnjvnfvfjvnjfnvjf
                vfvfvnjfvnjfnvjfjvfnjvnfjvnjfnvjfnjvnfjnvjfvnfj
                vkfmvkmdfnvnfjrnviurovifonvjfnvjnfjnvjnfvjnfvnj
                nvjnfjvnfvnfjvjfnvjnfvjnfjvnjfvnfvjlsoivfnjvnfd
                vkfnvnfjvnokjnfijopfpefkfmnvjnvjfnsnsklfkdsioefnle
                kfvnfnvfnvofvkf;sppoekmvkmfvnfkdsopspepkrkmkmksmdkmslksmkmf
                kdcndckdncdkncslcslnslnlsnkdlsdcskmldsmkmlksmlcmslkdmcklsmck
                smcksmclsmcmsdcmsldcsldcsdcksmckmslcsmlcmsldmcsldmclsdkmcsdkmckmlscs
                kmdlkmslckmsdlcmsldkmcklmdsclkmslmclkmslcsdkcmlsdmclsdcmsdmcslcmslm
                kmlkmcslmcsdlcmsldmclsmdclmdnlkefppfiodnckdmckdmckdmckmdckmdkmckdmcd
                dklckdmckdincdclscmspcsnocnsnclksclmskcmskmckscmksmmcsmpcmsckmskmckms
                sklcmlscoinldklclkdncsjdncjsdncjsdncjsdnclsnclkslcsnlkcnslkdncslk
        </p>
        <p class="mb-3">
            Curabitur at justo at sapien cursus vehicula. Morbi nec velit sed orci 
            mattis dictum.
        </p>
        <p>
            Thank you for being part of our journey.
        </p>

        <!-- Clear float -->
        <div class="clear-both"></div>
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