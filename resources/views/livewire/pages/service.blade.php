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
$services = [
    [
        'title' => 'Project Consultancy Services',
        'content' => '
            <ul>
                <li><strong>Feasibility Studies & Market Research</strong> – evaluating project viability and demand.</li>
                <li><strong>Urban Planning & Design</strong> – providing modern, sustainable, and compliant designs.</li>
                <li><strong>Cost Estimation & Financial Advisory</strong> – helping clients understand investment requirements and funding options.</li>
                <li><strong>Regulatory Guidance</strong> – ensuring compliance with government policies, laws, and environmental standards.</li>
            </ul>
        ',
    ],
    [
        'title' => 'Construction & Project Delivery',
        'content' => '
            <ul>
                <li><strong>Residential Housing Projects</strong> – affordable housing, luxury apartments, and gated communities.</li>
                <li><strong>Commercial & Mixed-Use Developments</strong> – office spaces, shopping complexes, and industrial facilities.</li>
                <li><strong>Government & Institutional Projects</strong> – schools, hospitals, government offices, and public housing schemes.</li>
                <li><strong>Turnkey Solutions</strong> – from planning and design to construction and handover.</li>
            </ul>
        ',
    ],
    [
        'title' => 'Public–Private Partnerships (PPP)',
        'content' => '
            <p>We collaborate with both government institutions and private investors to deliver impactful housing and infrastructure projects. Through PPP arrangements, we ensure:</p>
            <ul>
                <li>Shared risk and investment.</li>
                <li>Faster project execution.</li>
                <li>Long-term sustainability and community development.</li>
            </ul>
        ',
    ],
    [
        'title' => 'Renovation & Maintenance Services',
        'content' => '
            <ul>
                <li>Rehabilitation of old housing estates.</li>
                <li>Upgrading public facilities.</li>
                <li>Regular property maintenance services.</li>
            </ul>
        ',
    ],
    [
        'title' => 'Sustainability & Innovation',
        'content' => '
            <ul>
                <li>Use of renewable energy solutions (solar, wind).</li>
                <li>Eco-friendly materials and designs.</li>
                <li>Smart housing technologies for improved efficiency.</li>
            </ul>
        ',
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
                
               <x-services :services="$services" />
                
               
                  
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
