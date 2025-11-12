@props([
    'title' => null, // optional, fallback from last segment
])

@php
    // Get the original route path (before Livewire modifies it)
    $routePath = request()->route() ? request()->route()->uri() : request()->path();

    // Check if this is a Livewire request
    $isLivewireRequest = request()->header('X-Livewire') || str_contains(request()->path(), 'livewire');

    // If Livewire request, use the referer URL to get original segments
    if ($isLivewireRequest && request()->header('Referer')) {
        $refererPath = parse_url(request()->header('Referer'), PHP_URL_PATH);
        $segments = array_filter(explode('/', trim($refererPath, '/')));
    } else {
        // Break the current path into segments
        $segments = request()->segments(); // e.g. ['home', 'starting-business']
    }

    // Filter out Livewire artifacts
    $segments = array_filter($segments, function ($segment) {
        return !in_array(strtolower($segment), ['livewire', 'update', 'message', 'preview-file', 'upload', 'download']);
    });

    // Re-index array after filtering
    $segments = array_values($segments);

    // Build breadcrumb array => [label => url|null]
    $breadcrumbs = [];
    $url = '';
    foreach ($segments as $index => $segment) {
        $url .= '/' . $segment;
        $label = ucwords(str_replace('-', ' ', $segment)); // prettify

        // Last item is not clickable
        $breadcrumbs[$label] = $index === array_key_last($segments) ? null : $url;
    }

    // Auto-title if not provided
    $pageTitle = $title ?? (count($breadcrumbs) ? array_key_last($breadcrumbs) : 'Home');
@endphp

<section class="bg-gradient-to-b from-black/30 via-black/50 to-black/70 h-32 border-b-2 lg:px-8 px-4">
    <div class="container mx-auto">
        <div class="flex flex-col justify-between py-12 md:flex-row">

            {{-- Title --}}
            <div class="mx-2">
                <span class="font-bold text-base md:text-xl uppercase text-white">
                    {{ $pageTitle }}
                </span>
            </div>

            {{-- Breadcrumb --}}
            <div class="mx-2 mt-2">
                <ul class="breadcrumb font-semibold text-md pl-0 flex gap-2">

                    {{-- Home always first --}}
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">
                            <i class="fa fa-home" aria-hidden="true"></i> Home
                        </a>
                    </li>

                    {{-- Other segments --}}
                    @foreach ($breadcrumbs as $label => $url)
                        <li class="breadcrumb-item capitalize items-center">
                            @if ($url)
                                <span class="mx-2">/</span>
                                <a class="text-white" href="{{ $url }}">{{ $label }}</a>
                            @else
                                <span class="mx-2">/</span>
                                <span class="text-gray-400">{{ $label }}</span>
                            @endif
                        </li>
                    @endforeach


                </ul>
            </div>

        </div>
    </div>
</section>
