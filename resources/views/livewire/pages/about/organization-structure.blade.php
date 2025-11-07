    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .org-box {
            background: white;
            border: 2px solid #000;
            padding: 8px 10px;
            text-align: center;
            font-weight: 600;
            font-size: 10px;
            line-height: 1.3;
            min-height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .line-v {
            width: 2px;
            background: #000;
            margin: 0 auto;
        }

        .line-h {
            height: 2px;
            background: #000;
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

                <svg viewBox="0 0 1600 1400" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <style>
                            .org-box {
                                fill: white;
                                stroke: #2563eb;
                                stroke-width: 4;
                            }

                            .org-text {
                                font-family: Arial, sans-serif;
                                font-size: 13px;
                                text-anchor: middle;
                                font-weight: bold;
                                fill: #1e40af;
                            }

                            .title-text {
                                font-family: Arial, sans-serif;
                                font-size: 24px;
                                font-weight: bolder;
                                text-anchor: middle;
                                fill: #1e40af;
                            }

                            .line {
                                stroke: #2563eb;
                                stroke-width: 3;
                                fill: none;
                            }
                        </style>
                    </defs>

                    <!-- Title -->
                    <text x="800" y="40" class="title-text">MUUNDO WA SHIRIKA LA NYUMBA ZANZIBAR</text>

                    <!-- Level 1: Board -->
                    <rect x="710" y="70" width="180" height="50" class="org-box" rx="5" />
                    <text x="800" y="92" class="org-text">BODI YA</text>
                    <text x="800" y="108" class="org-text">WAKURUGENZI</text>
                    <line x1="800" y1="120" x2="800" y2="150" class="line" />

                    <!-- Level 2: Directors -->
                    <rect x="620" y="150" width="180" height="50" class="org-box" rx="5" />
                    <text x="710" y="172" class="org-text">MKURUGENZI</text>
                    <text x="710" y="188" class="org-text">MKUU</text>

                    <rect x="800" y="150" width="180" height="50" class="org-box" rx="5" />
                    <text x="890" y="172" class="org-text">NAIBU</text>
                    <text x="890" y="188" class="org-text">MKURUGENZI</text>

                    <line x1="800" y1="200" x2="800" y2="240" class="line" />

                    <!-- Level 3: Horizontal line for departments -->
                    <line x1="100" y1="240" x2="1500" y2="240" class="line" />

                    <!-- Level 3: Departments (6 boxes) -->
                    <!-- Department 1 -->
                    <line x1="235" y1="240" x2="235" y2="280" class="line" />
                    <rect x="150" y="280" width="170" height="50" class="org-box" rx="5" />
                    <text x="235" y="302" class="org-text">KITENGO CHA</text>
                    <text x="235" y="318" class="org-text">TEHAMA</text>

                    <!-- Department 2 -->
                    <line x1="435" y1="240" x2="435" y2="280" class="line" />
                    <rect x="350" y="280" width="170" height="50" class="org-box" rx="5" />
                    <text x="435" y="295" class="org-text">KITENGO CHA</text>
                    <text x="435" y="311" class="org-text">HUDUMA ZA SHERIA</text>

                    <!-- Department 3 -->
                    <line x1="635" y1="240" x2="635" y2="280" class="line" />
                    <rect x="550" y="280" width="170" height="50" class="org-box" rx="5" />
                    <text x="635" y="291" class="org-text">KITENGO CHA</text>
                    <text x="635" y="305" class="org-text">UHUSIANO HABARI</text>
                    <text x="635" y="319" class="org-text">NA ELIMU</text>

                    <!-- Department 4 -->
                    <line x1="965" y1="240" x2="965" y2="280" class="line" />
                    <rect x="880" y="280" width="170" height="50" class="org-box" rx="5" />
                    <text x="965" y="295" class="org-text">KITENGO CHA</text>
                    <text x="965" y="311" class="org-text">UKAGUZI WA NDANI</text>

                    <!-- Department 5 -->
                    <line x1="1165" y1="240" x2="1165" y2="280" class="line" />
                    <rect x="1080" y="280" width="170" height="50" class="org-box" rx="5" />
                    <text x="1165" y="295" class="org-text">KITENGO CHA</text>
                    <text x="1165" y="311" class="org-text">UNUNUZI NA UGAVI</text>

                    <!-- Department 6 -->
                    <line x1="1365" y1="240" x2="1365" y2="280" class="line" />
                    <rect x="1280" y="280" width="170" height="50" class="org-box" rx="5" />
                    <text x="1365" y="302" class="org-text">KITENGO CHA</text>
                    <text x="1365" y="318" class="org-text">UHASIBU</text>

                    <!-- Vertical connector to divisions -->
                    <line x1="800" y1="200" x2="800" y2="370" class="line" />

                    <!-- Level 4: Horizontal line for divisions -->
                    <line x1="100" y1="370" x2="1500" y2="370" class="line" />

                    <!-- Level 4: Main Divisions (5 boxes) -->
                    <!-- Division 1 -->
                    <line x1="210" y1="370" x2="210" y2="410" class="line" />
                    <rect x="100" y="410" width="220" height="60" class="org-box" rx="5" />
                    <text x="210" y="427" class="org-text">IDARA YA HUDUMA</text>
                    <text x="210" y="442" class="org-text">ZA KIFUNDI NA</text>
                    <text x="210" y="457" class="org-text">UEKEZAJI</text>

                    <!-- Division 2 -->
                    <line x1="470" y1="370" x2="470" y2="410" class="line" />
                    <rect x="360" y="410" width="220" height="60" class="org-box" rx="5" />
                    <text x="470" y="423" class="org-text">IDARA YA</text>
                    <text x="470" y="437" class="org-text">USIMAMIZI WA MILKI</text>
                    <text x="470" y="451" class="org-text">NA UENDESHAJI NA</text>
                    <text x="470" y="465" class="org-text">BIASHARA</text>

                    <!-- Division 3 -->
                    <line x1="730" y1="370" x2="730" y2="410" class="line" />
                    <rect x="620" y="410" width="220" height="60" class="org-box" rx="5" />
                    <text x="730" y="435" class="org-text">IDARA YA MIPANGO</text>
                    <text x="730" y="451" class="org-text">NA UTAFITI</text>

                    <!-- Division 4 -->
                    <line x1="990" y1="370" x2="990" y2="410" class="line" />
                    <rect x="880" y="410" width="220" height="60" class="org-box" rx="5" />
                    <text x="990" y="435" class="org-text">IDARA YA UTAWALA</text>
                    <text x="990" y="451" class="org-text">NA RASIMALI WATU</text>

                    <!-- Division 5 -->
                    <line x1="1250" y1="370" x2="1250" y2="410" class="line" />
                    <rect x="1140" y="410" width="220" height="60" class="org-box" rx="5" />
                    <text x="1250" y="443" class="org-text">OFISI YA PEMBA</text>

                    <!-- Level 5: Sections under Division 1 -->
                    <line x1="210" y1="470" x2="210" y2="510" class="line" />
                    <rect x="100" y="510" width="220" height="60" class="org-box" rx="5" />
                    <text x="210" y="527" class="org-text">SEHEMU YA</text>
                    <text x="210" y="541" class="org-text">HUDUMA ZA</text>
                    <text x="210" y="555" class="org-text">UHANDISI NA UJENZI</text>

                    <line x1="210" y1="570" x2="210" y2="590" class="line" />
                    <rect x="100" y="590" width="220" height="40" class="org-box" rx="5" />
                    <text x="210" y="607" class="org-text">SEHEMU YA</text>
                    <text x="210" y="621" class="org-text">UEKEZAJI</text>

                    <line x1="210" y1="630" x2="210" y2="650" class="line" />
                    <rect x="100" y="650" width="220" height="50" class="org-box" rx="5" />
                    <text x="210" y="667" class="org-text">SEHEMU YA</text>
                    <text x="210" y="682" class="org-text">UBUNIFU WA MAJENGO</text>

                    <!-- Level 5: Sections under Division 2 -->
                    <line x1="470" y1="470" x2="470" y2="510" class="line" />
                    <rect x="360" y="510" width="220" height="60" class="org-box" rx="5" />
                    <text x="470" y="527" class="org-text">SEHEMU YA</text>
                    <text x="470" y="541" class="org-text">UTAFHMINI NA</text>
                    <text x="470" y="555" class="org-text">USIMAMIZI WA MILKI</text>

                    <line x1="470" y1="570" x2="470" y2="590" class="line" />
                    <rect x="360" y="590" width="220" height="50" class="org-box" rx="5" />
                    <text x="470" y="607" class="org-text">SEHEMU YA</text>
                    <text x="470" y="622" class="org-text">BIASHARA NA MASOKO</text>

                    <!-- Level 5: Sections under Division 3 -->
                    <line x1="730" y1="470" x2="730" y2="510" class="line" />
                    <rect x="620" y="510" width="220" height="40" class="org-box" rx="5" />
                    <text x="730" y="535" class="org-text">SEHEMU YA UTAFITI</text>

                    <line x1="730" y1="550" x2="730" y2="570" class="line" />
                    <rect x="620" y="570" width="220" height="40" class="org-box" rx="5" />
                    <text x="730" y="587" class="org-text">SEHEMU YA</text>
                    <text x="730" y="601" class="org-text">MIPANGO</text>

                    <!-- Level 5: Sections under Division 4 -->
                    <line x1="990" y1="470" x2="990" y2="510" class="line" />
                    <rect x="880" y="510" width="220" height="40" class="org-box" rx="5" />
                    <text x="990" y="527" class="org-text">SEHEMU YA</text>
                    <text x="990" y="541" class="org-text">UTAWALA</text>

                    <line x1="990" y1="550" x2="990" y2="570" class="line" />
                    <rect x="880" y="570" width="220" height="40" class="org-box" rx="5" />
                    <text x="990" y="587" class="org-text">SEHEMU YA</text>
                    <text x="990" y="601" class="org-text">RASIMALI WATU</text>
                </svg>






            </div>


            {{-- Right column: col-span-2 --}}
            <div class="hidden lg:block lg:col-span-4">
                <x-news.news-header />
                @foreach ($newsArray as $item)
                    <div class="mb-4 mt-2">
                        <div class="flex items-start gap-4 mb-4">
                            <!-- Image Section -->
                            <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
                                class="w-32 h-20 flex-shrink-0">
                                @unless (empty($item['images'][0]['original']))
                                    <img src="{{ $item['images'][0]['original'] }}"
                                        alt="{{ $item['title'] ?? 'News Image' }}"
                                        class="w-full h-full object-cover rounded-md" />
                                @endunless
                            </a>

                            <!-- Content Section -->
                            <div class="flex flex-col justify-center">
                                <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
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
