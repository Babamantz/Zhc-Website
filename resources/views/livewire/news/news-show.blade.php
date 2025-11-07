<div class="flex flex-col">
    <x-page-header title="NEWS" />
    <div class="lg:grid lg:grid-cols-11 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">



        {{-- Left column: col-span-10  --}}
        <div class="lg:col-span-6" x-data="{
            open: false,
            selectedImage: '',
            selectedTitle: '',
            selectedCaption: '',
            currentIndex: 0,
            images: {{ json_encode(
                collect($news['images'])->map(
                    fn($img) => [
                        'url' => $img['medium'],
                        'name' => $news['title'],
                        'caption' => $news['content'],
                    ],
                ),
            ) }}
        }"
            x-effect="document.body.classList.toggle('overflow-hidden', open)">

            <h1 class="text-2xl font-bold border-b-2 mb-4">News</h1>
            <div class="flex-1">
                <a href="{{ route('news.show', ['news' => $news['slug']]) }}"
                    class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                    {{ $news['title'] }}
                </a>

                <div class="text-sm text-gray-600 mt-1 flex items-center">
                    <i class="fa fa-calendar mr-1 text-gray-500"></i>
                    {{ \Carbon\Carbon::parse($news['date'])->format('d M, Y') }}
                </div>

                <p class="text-sm text-gray-600 mt-3 leading-relaxed">
                    {!! Str::limit(strip_tags($news['content']), 200) !!}
                </p>
            </div>

            <!-- Single News Item -->
            <div class="flex flex-col md:flex-row items-start gap-4 mb-6">
                <!-- Image(s) Section -->
                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach ($news['images'] as $index => $image)
                        <div class="relative group cursor-pointer overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300"
                            @click="
                        open = true;
                        currentIndex = {{ $index }};
                        selectedImage = images[currentIndex].url;
                        selectedTitle = images[currentIndex].name;
                        selectedCaption = images[currentIndex].caption;
                     ">
                            <img src="{{ $image['original'] }}" alt="image"
                                class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">

                            <!-- Hover Overlay -->
                            <div
                                class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                                <div
                                    class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/90 rounded-full p-3 shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Counter -->
                            <div
                                class="absolute top-2 right-2 bg-black/60 text-white text-xs px-2 py-1 rounded-full backdrop-blur-sm">
                                {{ $index + 1 }} / {{ count($news['images']) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Content Section -->

            </div>

            <!-- Image Modal -->
            <template x-teleport="body">
                <div x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-black/95 flex items-center justify-center z-50 p-4" @click="open = false"
                    @keydown.escape.window="open = false"
                    @keydown.arrow-left.window="
                if (open && currentIndex > 0) {
                    currentIndex--;
                    selectedImage = images[currentIndex].url;
                    selectedTitle = images[currentIndex].name;
                    selectedCaption = images[currentIndex].caption;
                }"
                    @keydown.arrow-right.window="
                if (open && currentIndex < images.length - 1) {
                    currentIndex++;
                    selectedImage = images[currentIndex].url;
                    selectedTitle = images[currentIndex].name;
                    selectedCaption = images[currentIndex].caption;
                }"
                    style="display: none;">

                    <!-- Modal Content -->
                    <div class="relative max-w-6xl w-full max-h-[95vh] flex flex-col">
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-4 text-white">
                            {{-- <div class="flex-1">
                                <h3 class="text-lg font-semibold" x-text="selectedTitle"></h3>
                                <p class="text-sm text-gray-300 mt-1" x-show="selectedCaption" x-text="selectedCaption">
                                </p>
                            </div> --}}
                            <div class="text-sm bg-white/20 px-3 py-1 rounded-full backdrop-blur-sm mx-4">
                                <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
                            </div>
                            <button @click="open = false"
                                class="text-white hover:text-gray-300 text-4xl font-light transition-all duration-200 hover:rotate-90">&times;
                            </button>
                        </div>

                        <!-- Image Display -->
                        <div class="flex items-center justify-center flex-1 relative" @click.stop>
                            <!-- Prev -->
                            <button x-show="currentIndex > 0"
                                @click.stop="
                                currentIndex--;
                                selectedImage = images[currentIndex].url;
                                selectedTitle = images[currentIndex].name;
                                selectedCaption = images[currentIndex].caption;
                            "
                                class="absolute left-4 z-10 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-200 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            <img :src="selectedImage" :alt="selectedTitle"
                                class="max-w-full max-h-full object-contain rounded-lg shadow-2xl cursor-zoom-out"
                                @click="open = false" />

                            <!-- Next -->
                            <button x-show="currentIndex < images.length - 1"
                                @click.stop="
                                currentIndex++;
                                selectedImage = images[currentIndex].url;
                                selectedTitle = images[currentIndex].name;
                                selectedCaption = images[currentIndex].caption;
                            "
                                class="absolute right-4 z-10 bg-white/20 hover:bg-white/30 text-white p-3 rounded-full backdrop-blur-sm transition-all duration-200 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>

                        <!-- Actions -->
                        <div class="mt-4 bg-black/40 backdrop-blur-sm rounded-lg p-4 text-center">
                            <a :href="selectedImage" download @click.stop
                                class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition-colors duration-200 inline-flex items-center gap-2 text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Download
                            </a>
                            <button @click="open = false"
                                class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg ml-4 transition-colors duration-200 inline-flex items-center gap-2 text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Close (ESC)
                            </button>

                            <div class="text-gray-400 text-xs mt-3">
                                Use <kbd class="px-2 py-1 bg-white/10 rounded">←</kbd> <kbd
                                    class="px-2 py-1 bg-white/10 rounded">→</kbd> to navigate
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>


        {{-- <x-vertical-line thickness="2" color="black" /> --}}

        {{-- Right column: col-span-2 --}}
        <div class="hidden lg:block lg:col-span-4">
            <x-announcements.announcement-section :announcements="$announcementsValues" />

        </div>
    </div>
</div>
