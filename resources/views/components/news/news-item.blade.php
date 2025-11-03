@props(['image', 'imageId', 'title', 'date', 'excerpt' => null, 'showExcerpt' => false])
{{-- @dd($imageId) --}}



<div class="mb-4">
    <div class="flex items-start gap-4 mb-4">
        <!-- Image Section -->
        <a href="{{ route('news.show', ['news' => $imageId]) }}" class="w-32 mt-1 h-20 flex-shrink-0">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover rounded-md" />
        </a>

        <!-- Content Section -->
        <div class="flex flex-col justify-center">
            <a href="{{ route('news.show', ['news' => $imageId]) }}"
                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                {{ $title }}
            </a>
            <div class="text-sm text-gray-600 mt-1 flex items-center">
                <i class="fa fa-calendar mr-1 text-gray-500"></i>{{ \Carbon\carbon::parse($date)->format('d M ,Y') }}
            </div>
        </div>
    </div>
</div>
