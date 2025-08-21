<!-- resources/views/components/footer/media-links.blade.php -->
<div class="w-full lg:w-5/12 z-10 mt-10 lg:mt-0">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 text-white mb-6 md:mb-0">
            <x-footer.heading title="Media Center" />
            @foreach ([['label' => 'Speeches', 'url' => '/speeches'], ['label' => 'News in Brief', 'url' => '/news'], ['label' => 'Video Gallery', 'url' => '/galleries/listing/videos'], ['label' => 'Photo Gallery', 'url' => '/galleries/listing/photos'], ['label' => 'Magazines', 'url' => '/publications/magazines'], ['label' => 'Press Releases', 'url' => '/press-releases']] as $link)
                <div class="py-1"><a href="{{ $link['url'] }}" class="hover:underline">{{ $link['label'] }}</a></div>
            @endforeach
        </div>

        <div class="w-full md:w-1/2 text-white">
            <x-footer.heading title="Important Links" />
            @foreach ([ ['label' => 'ZRA', 'url' => 'http://zanrevenue.org'], ['label' => 'MOLD', 'url' => 'https://ardhismz.go.tz'], ['label' => 'NHC', 'url' => 'https://nhc.co.tz']] as $link)
                <div class="py-1"><a href="{{ $link['url'] }}" target="_blank"
                        class="hover:underline">{{ $link['label'] }}</a></div>
            @endforeach
        </div>
    </div>
</div>
