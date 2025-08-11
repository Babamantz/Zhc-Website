<div class="flex flex-col">
    <div class="flex justify-between border-b-2 border-black-active">
        <div class="flex items-center bg-black rounded-t-md text-cp-white">
            <span class="px-2"><i class="fa fa-newspaper fa-2x"></i></span>
            <h3 class="pr-2">News & Events</h3>
        </div>
    </div>
    <div class="lg:grid lg:grid-cols-2 lg:gap-2 flex flex-col mt-2">
        <div class="mb-4 hidden md:block py-2">
            <x-news.news-teaser href="/news/tax-symposium-attracts-stakeholders"
                img="https://www.tra.go.tz/images/uploads/news/featured_image/TRA-4A5A1397.JPG"
                title="TAX SYMPOSIUM ATTRACTS STAKEHOLDERS" date="10 May, 2025"
                excerpt="Taxpayers who participated in the Tax symposium held on May 8, 2025, in Dar es Salaam, organized by the Institute of…" />
        </div>
        <div class="grid-cols-1">
            @foreach ([
        [
            'href' => '/news/tax-symposium-attracts-stakeholders',
            'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/TRA-4A5A1397.JPG',
            'title' => 'TAX SYMPOSIUM ATTRACTS STAKEHOLDERS',
            'date' => '10 May, 2025',
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
    ] as $item)
                <x-news.news-item :image="$item['img']" :title="$item['title']" :url="$item['href']" :date="$item['date']" :excerpt="$item['excerpt'] ?? null"
                    :showExcerpt="true" />
            @endforeach
            <div class="flex justify-start">
                <a href="/news/all"
                    class="md:mt-4 text-base text-yellow-600 border-b-2 border-transparent hover:border-black-active hover:text-black-active">
                    View More <span><i class="fa fa-arrow-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>
