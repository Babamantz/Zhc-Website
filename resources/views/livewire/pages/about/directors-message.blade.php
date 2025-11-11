<div class="flex flex-col">
    <x-page-header title="Director's Message" />

    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">
        {{-- Left column: Director’s message --}}
        <div class="lg:col-span-6 ">
            <h2 class="text-2xl font-bold mb-6 border-b-2 border-black-300">Director's Message</h2>

            <div class="text-gray-700 leading-relaxed">
                {{-- Director’s Photo + Message Container --}}
                <div class="flex flex-col sm:flex-row sm:items-start sm:gap-4">
                    {{-- Director’s Photo --}}
                    @if (!empty($directorMessage) && $directorMessage->getFirstMediaUrl('director_images'))
                        <img src="{{ $directorMessage->getFirstMediaUrl('director_images') }}" alt="Director Photo"
                            loading="lazy"
                            class="w-40 h-44 sm:w-48 sm:h-52 mt-1.5 object-cover rounded-lg shadow-md mx-auto sm:mx-0 mb-4 sm:mb-0">
                    @endif

                    {{-- Message Content --}}
                    <div class="flex-1 mb-3">
                        @if (!empty($directorMessage) && !empty($directorMessage->content))
                            {!! $directorMessage->content !!}
                        @else
                            <p class="text-gray-500 italic">No message available at the moment.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Right column: Latest News --}}
        <div class="mt-8 lg:mt-0 lg:col-span-4">
            <x-news.news-header />

            @forelse ($newsArray as $item)
                <div class="mb-4 mt-2">
                    <div class="flex items-start gap-4 mb-4">
                        {{-- News Image --}}
                        <a href="{{ route('news.show', ['news' => $item['slug']]) }}" class="w-32 h-20 flex-shrink-0">
                            @if (!empty($item['images'][0]['original']))
                                <img src="{{ $item['images'][0]['original'] }}"
                                    alt="{{ $item['title'] ?? 'News Image' }}"
                                    class="w-full h-full object-cover rounded-md">
                            @endif
                        </a>

                        {{-- News Details --}}
                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] ?? 'Untitled News' }}
                            </a>

                            @if (!empty($item['date']))
                                <div class="text-sm text-gray-600 mt-1 flex items-center">
                                    <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                    {{ \Carbon\Carbon::parse($item['date'])->format('d M, Y') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 italic mt-4">No recent news found.</p>
            @endforelse
        </div>
    </div>
</div>
