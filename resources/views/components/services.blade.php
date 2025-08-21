<div x-data="{ open: 0 }" class="space-y-4">
    @foreach($services as $index => $service)
        <div class="border rounded-lg shadow-sm">
            <button 
                @click="open === {{ $index }} ? open = null : open = {{ $index }}" 
                class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200 font-semibold">
                <span>{{ $service['title'] }}</span>
                <span x-text="open === {{ $index }} ? '-' : '+'"></span>
            </button>
            <div x-show="open === {{ $index }}" class="px-4 py-3 border-t bg-white">
                {!! $service['content'] !!}
            </div>
        </div>
    @endforeach
</div>
