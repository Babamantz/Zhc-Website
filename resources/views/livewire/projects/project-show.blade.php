<div class="flex  flex-col">
    <x-page-header title="PROJECTS" />


    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6 mb-3" x-data="{
            imageModalOpen: false,
            selectedImage: '',
            selectedTitle: '',
            selectedCaption: '',
            currentIndex: 0,
            images: {{ json_encode(
                $project->getMedia('project_images')->map(
                        fn($media) => [
                            'url' => $media->getUrl(),
                            'name' => $media->name,
                            'caption' => $media->getCustomProperty('caption'),
                        ],
                    )->toArray(),
            ) }}
        }">
            <h1 class="text-2xl font-bold border-b-2">{{ $project->project_name }}</h1>

            <div class="flex flex-col">
                <div class="text-sm md:text-base">
                    <div class="max-w-6xl mt-5 mx-auto">
                        <p class="text-gray-700">{!! $project->content !!}</p>

                        {{-- Image Grid --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                            @foreach ($project->getMedia('project_images') as $index => $media)
                                <div class="rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 group cursor-pointer relative"
                                    @click="imageModalOpen = true; 
                                     currentIndex = {{ $index }}; 
                                     selectedImage = '{{ $media->getUrl() }}'; 
                                     selectedTitle = '{{ $media->name }}';
                                     selectedCaption = '{{ $media->getCustomProperty('caption') ?? '' }}'">

                                    {{-- Image --}}
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"
                                            class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110">

                                        {{-- Overlay on hover --}}
                                        <div
                                            class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                                            <div
                                                class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/90 rounded-full p-3 shadow-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                                </svg>
                                            </div>
                                        </div>

                                        {{-- Image counter badge --}}
                                        <div
                                            class="absolute top-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded-full backdrop-blur-sm">
                                            {{ $index + 1 }} / {{ count($project->getMedia('project_images')) }}
                                        </div>
                                    </div>

                                    {{-- Caption --}}
                                    @if ($media->getCustomProperty('caption'))
                                        <div
                                            class="p-3 text-sm text-gray-600 bg-white group-hover:bg-gray-50 transition-colors duration-200">
                                            {{ $media->getCustomProperty('caption') }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Image Gallery Modal --}}
            <template x-teleport="body">
                <div x-show="imageModalOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" @click="imageModalOpen = false"
                    @keydown.escape.window="imageModalOpen = false"
                    @keydown.arrow-left.window="if(imageModalOpen && currentIndex > 0) { currentIndex--; selectedImage = images[currentIndex].url; selectedTitle = images[currentIndex].name; selectedCaption = images[currentIndex].caption || ''; }"
                    @keydown.arrow-right.window="if(imageModalOpen && currentIndex < images.length - 1) { currentIndex++; selectedImage = images[currentIndex].url; selectedTitle = images[currentIndex].name; selectedCaption = images[currentIndex].caption || ''; }"
                    class="fixed inset-0 bg-black/95 flex items-center justify-center z-50 p-4" style="display: none;">

                    <div class="relative max-w-7xl max-h-[95vh] w-full h-full flex flex-col">
                        {{-- Header Bar --}}
                        <div class="flex items-center justify-between mb-4 text-white">
                            {{-- Image Title --}}
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold" x-text="selectedTitle"></h3>
                                <p class="text-sm text-gray-300 mt-1" x-show="selectedCaption" x-text="selectedCaption">
                                </p>
                            </div>

                            {{-- Image Counter --}}
                            <div class="text-sm bg-white/20 px-3 py-1 rounded-full backdrop-blur-sm mx-4">
                                <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
                            </div>

                            {{-- Close Button --}}
                            <button @click="imageModalOpen = false"
                                class="text-white hover:text-gray-300 text-4xl font-light transition-all duration-200 hover:rotate-90">
                                &times;
                            </button>
                        </div>

                        {{-- Image Container --}}
                        <div class="flex items-center justify-center flex-1 relative" @click.stop>
                            {{-- Previous Button --}}
                            <button
                                @click.stop="if(currentIndex > 0) { currentIndex--; selectedImage = images[currentIndex].url; selectedTitle = images[currentIndex].name; selectedCaption = images[currentIndex].caption || ''; }"
                                x-show="currentIndex > 0"
                                class="absolute left-4 z-10 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-200 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            {{-- Image --}}
                            <img :src="selectedImage" :alt="selectedTitle"
                                class="max-w-full max-h-full object-contain rounded-lg shadow-2xl cursor-zoom-out"
                                @click="imageModalOpen = false" />

                            {{-- Next Button --}}
                            <button
                                @click.stop="if(currentIndex < images.length - 1) { currentIndex++; selectedImage = images[currentIndex].url; selectedTitle = images[currentIndex].name; selectedCaption = images[currentIndex].caption || ''; }"
                                x-show="currentIndex < images.length - 1"
                                class="absolute right-4 z-10 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-200 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>

                        {{-- Actions Bar --}}
                        <div class="mt-4 bg-black/40 backdrop-blur-sm rounded-lg p-4">
                            <div class="flex justify-center gap-4 flex-wrap">
                                <a :href="selectedImage" download @click.stop
                                    class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2 text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Download
                                </a>
                                <button @click="imageModalOpen = false"
                                    class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2 text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Close (ESC)
                                </button>
                            </div>

                            {{-- Keyboard hints --}}
                            <div class="text-center text-gray-400 text-xs mt-3">
                                Use <kbd class="px-2 py-1 bg-white/10 rounded">←</kbd> <kbd
                                    class="px-2 py-1 bg-white/10 rounded">→</kbd> arrow keys to navigate
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>


        {{-- Right column: col-span-2 --}}

        <div class="mt-8 lg:mt-0 lg:col-span-4">
            <x-news.news-header />

            @foreach ($newsArray as $item)
                <div class="mb-4 mt-2">
                    <div class="flex items-start gap-4 mb-4">

                        <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
                            class="w-32 h-20 flex-shrink-0">
                            <img src="{{ $item['images'][0]['original'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-full object-cover rounded-md" />
                        </a>

                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] }}
                            </a>
                            <div class="text-sm text-gray-600 mt-1 flex items-center">
                                <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                {{ \Carbon\carbon::parse($item['date'])->format('d M, Y') }}
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
