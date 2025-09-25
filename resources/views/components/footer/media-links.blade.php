<!-- resources/views/components/footer/media-links.blade.php -->
<div class="w-full lg:w-5/12 z-10 mt-10 lg:mt-0">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 text-white mb-6 md:mb-0">
            <x-footer.heading title="Media Center" />
            @foreach ([['label' => 'News in Brief', 'url' => '/news/all'], ['label' => 'Photo Gallery', 'url' => '#'], ['label' => 'Magazines', 'url' => '#']] as $link)
                <div class="py-1 text-center sm:text-center md:text-left"><a href="{{ $link['url'] }}" class="hover:underline">{{ $link['label'] }}</a></div>
            @endforeach
        </div>

        <div class="w-full md:w-1/2 text-white">
            <x-footer.heading title="Important Links" />
            @foreach ([['label' => 'ZRA', 'url' => 'http://zanrevenue.org'], ['label' => 'MOLD', 'url' => 'https://ardhismz.go.tz'], ['label' => 'NHC', 'url' => 'https://nhc.co.tz']] as $link)
                <div class="py-1 text-center sm:text-center md:text-left"><a href="{{ $link['url'] }}" target="_blank"
                        class="hover:underline">{{ $link['label'] }}</a></div>
            @endforeach
        </div>
    </div>
</div>
