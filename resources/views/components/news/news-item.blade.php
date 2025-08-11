@props(['image', 'title', 'url', 'date', 'excerpt' => null, 'showExcerpt' => false])
<div class="mb-4">
    <div class="flex items-start gap-4 mb-4">
        <!-- Image Section -->
        <a href="{{ $url }}" class="w-32 h-20 flex-shrink-0">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover rounded-md" />
        </a>

        <!-- Content Section -->
        <div class="flex flex-col justify-center">
            <a href="{{ $url }}" class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                {{ $title }}
            </a>
            <div class="text-sm text-gray-600 mt-1 flex items-center">
                <i class="fa fa-calendar mr-1 text-gray-500"></i> {{ $date }}
            </div>
        </div>
    </div>
</div>
