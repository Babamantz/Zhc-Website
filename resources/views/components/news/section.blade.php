@props([
    'title' => null,    // Optional section heading
    'teaser' => null,   // Optional teaser slot
    'items' => null,    // Optional items slot
    'grid' => true      // Control if grid layout is applied
])

<div class="flex flex-col">
  

    {{-- Layout: teaser + list --}}
    <div class="{{ $grid ? 'lg:grid lg:grid-cols-1 lg:gap-2 flex flex-col mt-2' : '' }}">
        
        {{-- Teaser slot --}}
        @isset($teaser)
            <div class="mb-4 hidden md:block py-2">
                {{ $teaser }}
            </div>
        @endisset

        {{-- Items slot --}}
        @isset($items)
            <div class="grid-cols-1">
                {{ $items }}
            </div>
        @endisset

    </div>
</div>
