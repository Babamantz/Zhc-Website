@props(['item'])
{{-- @dd($item) --}}
<div class="w-full flex flex-col items-start text-xs py-3 mb-2 relative">
    <div class="flex">
        <div class="flex-none mr-4">
            @if ($item['type'] === 'pdf')
                <a href="{{ $item['announcement'] }}" download id="notice">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M12 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 2v6h6" />
                        <text x="8" y="17" font-size="7" fill="currentColor" class="font-bold">PDF</text>
                    </svg>
                </a>
            @elseif ($item['type'] === 'label')
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 2v6h6" />
                    <text x="8" y="17" font-size="7" fill="currentColor" class="font-bold">PDF</text>
                </svg>
            @endif
        </div>
        <div class="flex-shrink">
            <p class="uppercase mb-1 font-bold">
                <a href="{{ $item['announcement'] }}" id="notice" download>
                    {{ $item['title'] }}
                </a>
            </p>
            <i class="fa fa-calendar text-sm"></i> {{ \Carbon\Carbon::parse($item['date'])->format('d M, Y') }}
        </div>
    </div>
</div>
