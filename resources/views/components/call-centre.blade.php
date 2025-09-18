@php
    $helpCenter = \App\Models\HelpCenter::first();
@endphp

<section class="bg-fit bg-no-repeat md:bg-fit bg-top h-auto"
    style="w-20 h-20 background-image: url('{{ $helpCenter?->getFirstMediaUrl('help_centers') ?: asset('images/call_c.jpg') }}')">
    <div class="py-16 md:py-0 bg-gradient-to-l from-yellow-400 to-transparent">
        <div class="container mx-auto px-4 pt-2 lg:px-8">
            <div class="flex flex-col px-4 md:px-8">
                <div class="text-center">
                    <p class="text-black text-sm font-bold sm:text-lg md:text-xl">
                        {{ $helpCenter->title ?? 'No data Available' }}
                    </p>
                    <p class="font-semibold text-sm sm:text-md py-2">
                        {{ $helpCenter->description ?? 'No data Available' }}
                    </p>
                </div>

                <div class="flex flex-wrap justify-center gap-8 py-4">
                    <!-- Phones -->
                    <div class="flex items-start md:items-center gap-8">
                        <div class="pl-4 flex flex-col items-center md:flex-none md:items-start">
                            @foreach ($helpCenter->phones ?? [] as $phone)
                                <p class="font-bold text-sm mx-2 py-2">
                                    {{ $phone['number'] }} - {{ $phone['label'] }}
                                </p>
                            @endforeach
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    @if ($helpCenter->whatsapp)
                        <div class="flex items-start md:items-center mx-4 gap-1">
                            <img class="hidden md:block w-16 h-16 md:w-20 md:h-20" src="/images/w-logo.svg"
                                alt="WhatsApp">
                            <p class="font-bold text-sm py-2">
                                {{ $helpCenter->whatsapp ?? 'No data Available' }} - WhatsApp
                            </p>
                        </div>
                    @endif

                    <!-- Email -->
                    @if ($helpCenter->email)
                        <div class="flex items-start md:items-center gap-1 mx-4">
                            <img class="hidden md:block w-16 h-16 md:w-20 md:h-20" src="/images/e-mail.svg"
                                alt="Email">
                            <p class="font-bold text-sm py-2">
                                {{ $helpCenter->email ?? 'No data Available' }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
