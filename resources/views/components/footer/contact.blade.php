<div class="w-full lg:w-7/12 z-10">
    <div class="flex flex-wrap">
        <div class="w-full md:w-7/12 text-white text-center sm:text-center md:text-left mb-6 md:mb-0">
            <x-footer.heading title="Contact Us" />
            <p class="my-1">Zanzibar Housing Corporation</p>
            <p class="my-1">Serikali ya Mapinduzi Zanzibar</p>
            <p class="my-1 mb-3">Sonara Building, Darajani, P.O.Box 795 Zanzibar</p>
            <p class="my-1"><i class="fas fa-envelope mr-2"></i> <a href="#">dg@zhc.go.tz</a></p>
            <p class="my-1"><i class="fas fa-phone mr-2"></i> <a href="">+255 24 2230067</a></p>
        </div>

        <div class="w-full md:w-5/12 pl-0 md:pl-6 text-white text-center sm:text-center md:text-left">
            <x-footer.heading :title="__('landing.landing.properties')" />
            @foreach ([['label' => 'Home', 'url' => '/'], ['label' => 'Contact Details', 'url' => '/contacts'], ['label' => 'Mission and Vision', 'url' => '/about/about_us'], ['label' => 'FAQs', 'url' => '/faqs'], ['label' => 'What we do?', 'url' => '/about/about_us'], ['label' => 'Who we Are?', 'url' => '/about/about_us'], ['label' => 'Who we Serve?', 'url' => '/about/about_us']] as $link)
                <div class="py-1"><a href="{{ $link['url'] }}" class="hover:underline">{{ $link['label'] }}</a></div>
            @endforeach
        </div>
    </div>
</div>
