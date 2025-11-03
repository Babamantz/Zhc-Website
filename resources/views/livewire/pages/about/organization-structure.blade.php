<style>
    /* General node box style */
    .box {
        background: white;
        border: 1px solid #cbd5e1;
        /* slate-300 */
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
        border-radius: 6px;
        padding: .6rem .8rem;
        text-align: center;
        min-width: 12rem;
    }

    /* Vertical line under a node */
    .vline {
        position: relative;
    }

    .vline::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 100%;
        transform: translateX(-50%);
        width: 2px;
        height: 1.25rem;
        background: #cbd5e1;
    }

    /* Horizontal connector between siblings/side nodes */
    .hconnector {
        position: relative;
    }

    .hconnector::before {
        content: "";
        position: absolute;
        height: 2px;
        left: 0;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        background: #cbd5e1;
    }

    /* little vertical connector above each child box */
    .child-stem::before {
        content: "";
        position: absolute;
        top: -1.25rem;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 1rem;
        background: #cbd5e1;
    }

    /* center vertical main trunk between director and departments */
    .main-trunk {
        position: relative;
    }

    .main-trunk::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 0;
        transform: translateX(-50%);
        width: 2px;
        height: 2.5rem;
        background: #cbd5e1;
        z-index: 0;
    }

    /* small horizontal connector for direct side node (Naibu) */
    .side-connector {
        position: relative;
    }

    .side-connector::before {
        content: "";
        position: absolute;
        width: calc(100% + 1.5rem);
        height: 2px;
        left: -1.5rem;
        top: 50%;
        transform: translateY(-50%);
        background: #cbd5e1;
        z-index: 0;
    }

    /* responsive tweaks */
    @media (max-width: 768px) {
        .side-connector::before {
            display: none;
        }

        /* on small screens stack vertically */
        .vline::after {
            height: 0.9rem;
        }

        .main-trunk::after {
            height: 1.25rem;
        }

        .child-stem::before {
            height: 0.8rem;
            top: -0.9rem;
        }
    }
</style>
<div class="flex  flex-col">
    <x-page-header title="Organization Structure" />

    {{-- Control div --}}


    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}

            <h2 class="text-2xl font-bold mb-6 border-b-2 ">Organization Structure</h2>


            <div class="w-full max-w-7xl">
                <div class="flex flex-col items-center">

                    <!-- BODI YA WAKURUGENZI -->
                    <div class="vline">
                        <div class="box w-56 mx-auto">BODI YA WAKURUGENZI</div>
                    </div>

                    <!-- MKURUGENZI MKUU with Naibu aside -->
                    <div class="mt-8 w-full flex justify-center">
                        <div class="w-full max-w-4xl relative flex flex-col items-center">
                            <!-- Director + Naibu layout -->
                            <div class="w-full flex flex-col md:flex-row md:items-center md:justify-center gap-6">
                                <!-- Director column (center) -->
                                <div class="flex flex-col items-center md:items-end md:w-1/2">
                                    <div class="vline main-trunk">
                                        <div class="box w-60">MKURUGENZI MKUU</div>
                                    </div>
                                </div>

                                <!-- Naibu aside (right of director on md+) -->
                                <div class="flex items-center md:items-start md:w-1/2 md:pl-6">
                                    <!-- On md+, create a horizontal connector from director to naibu -->
                                    <div class="side-connector md:pl-6">
                                        <div class="box w-56">NAIBU MKURUGENZI</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Immediate units connected under the director (center trunk) -->
                            <div class="w-full mt-6 flex justify-center">
                                <!-- horizontal connector bar across (between left stack and right stack) -->
                                <div class="w-full max-w-3xl relative">
                                    <!-- vertical stem from director to this connector -->
                                    <div class="absolute left-1/2 transform -translate-x-1/2 -translate-y-4">
                                        <!-- small vertical continuation already from main-trunk -->
                                    </div>

                                    <!-- Row of immediate units (left, center spacer, right) -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                                        <!-- Left stack -->
                                        <div class="flex flex-col items-center gap-6">
                                            <div class="h-8"></div> <!-- spacer so stems align nicely -->
                                            <div class="child-stem relative">
                                                <div class="box w-64">KITENGO CHA TEHAMA</div>
                                            </div>
                                            <div class="child-stem relative">
                                                <div class="box w-64">KITENGO CHA HUDUMA ZA SHERIA</div>
                                            </div>
                                            <div class="child-stem relative">
                                                <div class="box w-64">KITENGO CHA UHUSIANO HABARI NA ELIMU</div>
                                            </div>
                                        </div>

                                        <!-- Center placeholder for vertical trunk alignment -->
                                        <div class="flex justify-center">
                                            <!-- empty - acts as center column over trunk -->
                                        </div>

                                        <!-- Right stack -->
                                        <div class="flex flex-col items-center gap-6">
                                            <div class="h-8"></div>
                                            <div class="child-stem relative">
                                                <div class="box w-64">KITENGO CHA UKAGUZI WA NDANI</div>
                                            </div>
                                            <div class="child-stem relative">
                                                <div class="box w-64">KITENGO CHA UNUNUZI NA UGAVI</div>
                                            </div>
                                            <div class="child-stem relative">
                                                <div class="box w-64">KITENGO CHA UHASIBU</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Connector line down to Departments (main trunk) -->
                            <div class="w-full mt-8 flex justify-center">
                                <div class="relative w-full max-w-6xl flex justify-center">
                                    <!-- vertical trunk -->
                                    <div class="absolute left-1/2 transform -translate-x-1/2 top-0 w-0">
                                        <div style="width:2px; height:1.25rem; background:#cbd5e1;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Departments Row -->
                            <div class="w-full mt-10">
                                <div class="w-full max-w-6xl mx-auto relative">
                                    <!-- horizontal bar -->
                                    <div class="absolute left-0 right-0 top-6">
                                        <div style="height:2px; background:#cbd5e1;"></div>
                                    </div>

                                    <!-- departments boxes aligned on that horizontal bar with stems up -->
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 pt-10">
                                        <!-- Dept 1 -->
                                        <div class="relative flex justify-center">
                                            <div class="child-stem absolute -top-10"></div>
                                            <div class="box w-64 text-left">
                                                <div class="font-semibold text-sm">IDARA YA HUDUMA ZA KIFUNDI NA
                                                    UEKEZAJI</div>
                                                <ul class="mt-2 text-xs text-slate-600 list-disc list-inside">
                                                    <li>SEHEMU YA HUDUMA ZA UHANDISI NA UJENZI</li>
                                                    <li>SEHEMU YA UEKEZAJI</li>
                                                    <li>SEHEMU YA UBUNIFU WA MAJENGO</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Dept 2 -->
                                        <div class="relative flex justify-center">
                                            <div class="child-stem absolute -top-10"></div>
                                            <div class="box w-64 text-left">
                                                <div class="font-semibold text-sm">IDARA YA USIMAMIZI NA MILIKI NA
                                                    UENDESHAJI NA BIASHARA</div>
                                                <ul class="mt-2 text-xs text-slate-600 list-disc list-inside">
                                                    <li>SEHEMU YA UTATHMINI NA USIMAMIZI WA MILIKI</li>
                                                    <li>SEHEMU YA BIASHARA NA MASOKO</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Dept 3 -->
                                        <div class="relative flex justify-center">
                                            <div class="child-stem absolute -top-10"></div>
                                            <div class="box w-64 text-left">
                                                <div class="font-semibold text-sm">IDARA YA MIPANGO NA UTAFITI</div>
                                                <ul class="mt-2 text-xs text-slate-600 list-disc list-inside">
                                                    <li>SEHEMU YA UTAFITI</li>
                                                    <li>SEHEMU YA MIPANGO</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Dept 4 -->
                                        <div class="relative flex justify-center">
                                            <div class="child-stem absolute -top-10"></div>
                                            <div class="box w-64 text-left">
                                                <div class="font-semibold text-sm">IDARA YA UTAWALA NA RASIMALI WATU
                                                </div>
                                                <ul class="mt-2 text-xs text-slate-600 list-disc list-inside">
                                                    <li>SEHEMU YA UTAWALA</li>
                                                    <li>SEHEMU YA RASIMALI WATU</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Office Pemba -->
                                        <div class="relative flex justify-center">
                                            <div class="child-stem absolute -top-10"></div>
                                            <div class="box w-64">
                                                <div class="font-semibold text-sm">OFISI YA PEMBA</div>
                                            </div>
                                        </div>
                                    </div> <!-- /grid -->
                                </div>
                            </div> <!-- /departments -->
                        </div>
                    </div>
                </div>
            </div>


        </div>


        {{-- Right column: col-span-2 --}}
        <div class="hidden lg:block lg:col-span-4">
            <x-news.news-header />
            @foreach ($newsArray as $item)
                <div class="mb-4 mt-2">
                    <div class="flex items-start gap-4 mb-4">
                        <!-- Image Section -->
                        <a href="{{ route('news.show', ['news' => $item['id']]) }}" class="w-32 h-20 flex-shrink-0">
                            @unless (empty($item['images'][0]['original']))
                                <img src="{{ $item['images'][0]['original'] }}" alt="{{ $item['title'] ?? 'News Image' }}"
                                    class="w-full h-full object-cover rounded-md" />
                            @endunless
                        </a>

                        <!-- Content Section -->
                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['news' => $item['id']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] ?? 'Untitled News' }}
                            </a>

                            <div class="text-sm text-gray-600 mt-1 flex items-center">
                                <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                @unless (empty($item['date']))
                                    {{ \Carbon\Carbon::parse($item['date'])->format('d M, Y') }}
                                @endunless
                            </div>

                            {{-- Optional excerpt --}}
                            {{-- @unless (empty($item['excerpt']))
                                <p class="text-xs text-gray-500 mt-2">
                                    {!! $item['excerpt'] !!}
                                </p>
                            @endunless --}}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
