
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
    [
        'href' => '/news/deputy-chief-qadi-pass-on-the-culture-of-paying-taxes-to-your-children',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/0T5A8922.jpg',
        'title' => 'DEPUTY CHIEF QADI: “PASS ON THE CULTURE OF PAYING TAXES TO YOUR CHILDREN”',
        'date' => '17 March, 2025',
    ],
];
@endphp

<div class="flex  flex-col"> 
    <x-page-header title="About ZHC" />

    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}

            <div class="flex flex-col">
            <div class="text-sm md:text-base mx-2">
                
                <h3>Establishment&nbsp;</h3>
                <p><a href="https://www.tra.go.tz/">The Tanzania Revenue Authority (TRA)</a> was established by <strong>Act of Parliament No. 11 of 1995</strong>, and started its operations on <strong>1<sup>st</sup> July 1996</strong>. &nbsp;In carrying out its statutory functions, TRA is regulated by law, and is responsible for administering impartially various taxes of the Central Government.</p>
                <h3>Vision</h3><p>"A Trusted Revenue Administration for Socio-economic Development".</p>
                <h3>Our Mission</h3><p>"We Make It Easy to Pay Tax and Enhance Compliance for Sustainable Development".</p>
                <h3>Our Core Values</h3><p><a href="https://www.tra.go.tz/">TRA</a> core values are a handful of moral boundaries within which <a href="https://www.tra.go.tz/">TRA</a> operates. They define TRA’s personality and are ethical standards by which <a href="https://www.tra.go.tz/">TRA</a> would be measured. The values are a commitment to the stakeholders and are incorporated into all actions taken by the organization.</p><p>&nbsp;</p><ul><li><strong>Professionalism:</strong> We are committed to apply the law consistently, responsibly and with credibility using the skills and knowledge &nbsp; &nbsp; &nbsp;as a prerequisite in administering your requirements</li><li><strong>Accountability</strong>: We build and sustain an organization that values and promotes accountability</li><li><strong>Integrity</strong>: We believe in being fair and honest when serving you</li><li><strong>Trustworthy</strong>: We determine to maintain a workplace in which trustworthiness will thrive</li></ul>

                
                <div class="mt-8">
                    
                  </div>
                  
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
