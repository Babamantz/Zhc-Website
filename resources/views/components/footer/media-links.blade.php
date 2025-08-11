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
            @foreach ([['label' => 'MoF', 'url' => 'http://mof.go.tz'], ['label' => 'TRA', 'url' => '#'], ['label' => 'ZRB', 'url' => 'http://zanrevenue.org'], ['label' => 'NIDA', 'url' => 'http://nida.go.tz'], ['label' => 'ZCSRA', 'url' => 'https://zcsra.go.tz/'], ['label' => 'BRELA', 'url' => 'https://brela.go.tz'], ['label' => 'BPRA', 'url' => 'https://bpra.go.tz'], ['label' => 'LATRA', 'url' => 'https://latra.go.tz'], ['label' => 'Police Force', 'url' => 'https://police.go.tz']] as $link)
                <div class="py-1"><a href="{{ $link['url'] }}" target="_blank"
                        class="hover:underline">{{ $link['label'] }}</a></div>
            @endforeach
        </div>
    </div>
</div>
