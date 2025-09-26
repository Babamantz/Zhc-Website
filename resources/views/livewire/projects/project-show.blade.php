<div class="flex  flex-col">
    <x-page-header title="PROJECTS" />


    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            <h1 class="text-2xl font-bold border-b-2">{{ $project->project_name }}</h1>
            {{-- Featured properties or custom grid goes here --}}

            <div class="flex flex-col">
                <div class="text-sm md:text-base mx-2">

                    <div class="max-w-6xl mx-auto ">

                        <p class=" text-gray-700">{!! $project->content !!}</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($project->getMedia('project_images') as $media)
                                <div class="rounded-lg overflow-hidden shadow">
                                    <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"
                                        class="w-full h-64 object-cover">
                                    @if ($media->getCustomProperty('caption'))
                                        <div class="p-2 text-sm text-gray-600">
                                            {{ $media->getCustomProperty('caption') }}</div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>


        {{-- Right column: col-span-2 --}}

        <div class="hidden lg:block lg:col-span-4">
            <x-news.news-header />

            @foreach ($newsArray as $item)
                <div class="mb-4 mt-2">
                    <div class="flex items-start gap-4 mb-4">

                        <a href="{{ route('news.show', ['id' => $item['id']]) }}" class="w-32 h-20 flex-shrink-0">
                            <img src="{{ $item['images'][0]['original'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-full object-cover rounded-md" />
                        </a>

                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['id' => $item['id']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] }}
                            </a>
                            <div class="text-sm text-gray-600 mt-1 flex items-center">
                                <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                {{ \Carbon\carbon::parse($item['date'])->format('y-M-Y') }}
                            </div>
                            {{-- 
                            @if (!empty($item['excerpt']))
                                <p class="text-xs text-gray-500 mt-2">
                                    {!! $item['excerpt'] !!}
                                </p>
                            @endif --}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>
</div>
