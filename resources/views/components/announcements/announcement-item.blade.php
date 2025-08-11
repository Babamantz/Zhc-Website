@props(['item'])
<div class="w-full flex flex-col items-start text-xs py-3 mb-2 relative">
  <div class="flex">
    <div class="flex-none mr-4">
      @if ($item['type'] === 'pdf')
        <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer">
          <img class="object-cover rounded-md h-8" src="/public/dist/images/pdf2.svg" alt="PDF" />
        </a>
      @elseif ($item['type'] === 'label')
        <span class="xml-4 animate-slowping relative inline-flex items-center justify-center h-4 w-4 p-4 bg-cp-yellow opacity-75 rounded-full">
          <span class="text-black font-bold text-[0.4rem]">{{ $item['label'] }}</span>
        </span>
      @endif
    </div>
    <div class="flex-shrink">
      <p class="uppercase mb-1 font-bold">
        <a href="{{ $item['url'] }}" target="_blank" rel="noopener noreferrer">
          {{ $item['title'] }}
        </a>
      </p>
      <i class="fa fa-calendar text-sm"></i> {{ $item['date'] }}
    </div>
  </div>
</div>
