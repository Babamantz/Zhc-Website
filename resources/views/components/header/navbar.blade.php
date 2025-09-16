@php
    $completedProjects = App\Models\Project::where('status', 'Completed')->get();
    $ongoingProjects = App\Models\Project::where('status', 'Ongoing')->get();
@endphp

<nav {{ $attributes->merge(['class' => 'bg-[#F7931E] text-white']) }}>
    <div class="container flex justify-center mx-auto px-6 py-2 space-x-4">

        <a href="/" class="hover:underline">Home</a>
        {{-- <a href="{{ route('pages.about.about_zhc') }}" class="hover:underline">About</a> --}}

        <!-- Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @keydown.escape="open = false" type="button"
                class="inline-flex items-center space-x-1 hover:underline focus:outline-none" aria-haspopup="true"
                :aria-expanded="open.toString()">
                <span>About</span>
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute left-0 mt-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu" aria-label="Site list">
                    <li>
                        <a href="{{ route('about_zhc') }}" target="_self" rel="noopener noreferrer"
                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                            About Zhc
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('directors-message') }}" target="_self" rel="noopener noreferrer"
                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                            Directors Message
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('organization-structure') }}" target="_self" rel="noopener noreferrer"
                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                            Organization Structure
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- <a href="/properties" class="hover:underline">Properties</a> --}}
        <a href="/services" class="hover:underline">Services</a>
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @keydown.escape="open = false" type="button"
                class="inline-flex items-center space-x-1 hover:underline focus:outline-none" aria-haspopup="true"
                :aria-expanded="open.toString()">
                <span>Projects</span>
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Main Dropdown Menu -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute left-0 mt-1 w-56 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu" aria-label="Projects list">

                    <!-- Completed Projects -->
                    <li x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false" type="button"
                            class="w-full text-left px-4 py-2 hover:underline text-sm font-medium flex justify-between items-center"
                            role="menuitem" aria-haspopup="true" :aria-expanded="subOpen.toString()">
                            Completed
                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div x-show="subOpen" @click.away="subOpen = false" x-transition
                            class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-30"
                            style="min-width: 12rem;">
                            <ul class="py-1" role="menu">
                                @foreach ($completedProjects as $project)
                                    <li>
                                        <a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                                            {{ $project->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>

                    <!-- Ongoing Projects -->
                    <li x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false" type="button"
                            class="w-full text-left px-4 py-2 hover:underline text-sm font-medium flex justify-between items-center"
                            role="menuitem" aria-haspopup="true" :aria-expanded="subOpen.toString()">
                            Ongoing
                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div x-show="subOpen" @click.away="subOpen = false" x-transition
                            class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-30"
                            style="min-width: 12rem;">
                            <ul class="py-1" role="menu">
                                @foreach ($ongoingProjects as $project)
                                    <li>
                                        <a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                            class="block px-4 py-2 hover:underline text-sm font-medium"
                                            role="menuitem">
                                            {{ $project->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>


        {{-- <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @keydown.escape="open = false" type="button"
                class="inline-flex items-center space-x-1 hover:underline focus:outline-none" aria-haspopup="true"
                :aria-expanded="open.toString()">
                <span>Projects</span>
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Main Dropdown Menu -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute left-0 mt-1 w-56 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu" aria-label="Projects list">

                    <!-- Nested dropdown container -->


                    <li x-data="{ magOpen: false }" class="relative">
                        <button @click="magOpen = !magOpen" @keydown.escape="magOpen = false" type="button"
                            class="w-full text-left px-4 py-2 hover:underline text-sm font-medium flex justify-between items-center"
                            role="menuitem" aria-haspopup="true" :aria-expanded="magOpen.toString()">
                            Completed
                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <!-- Nested dropdown menu -->
                        <div x-show="magOpen" @click.away="magOpen = false" x-transition
                            class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-30"
                            style="min-width: 12rem;">
                            <ul class="py-1" role="menu" aria-label="Magazines list">
                                <li>
                                    <a href="#monthly" class="block px-4 py-2 hover:underline text-sm font-medium"
                                        role="menuitem">Fundi Abdull</a>
                                </li>
                                <li>
                                    <a href="#annual" class="block px-4 py-2 hover:underline text-sm font-medium"
                                        role="menuitem">Mnadani</a>
                                </li>
                                <li>
                                    <a href="#special-editions"
                                        class="block px-4 py-2 hover:underline text-sm font-medium"
                                        role="menuitem">Mombasa</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li x-data="{ magOpen: false }" class="relative">
                        <button @click="magOpen = !magOpen" @keydown.escape="magOpen = false" type="button"
                            class="w-full text-left px-4 py-2 hover:underline text-sm font-medium flex justify-between items-center"
                            role="menuitem" aria-haspopup="true" :aria-expanded="magOpen.toString()">
                            Ongoing
                            <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <!-- Nested dropdown menu -->
                        <div x-show="magOpen" @click.away="magOpen = false" x-transition
                            class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-30"
                            style="min-width: 12rem;">
                            <ul class="py-1" role="menu" aria-label="Magazines list">
                                <li>
                                    <a href="#monthly" class="block px-4 py-2 hover:underline text-sm font-medium"
                                        role="menuitem">Mombasa Phase II</a>
                                </li>
                                <li>
                                    <a href="#annual" class="block px-4 py-2 hover:underline text-sm font-medium"
                                        role="menuitem">Kiembe Samaki</a>
                                </li>
                                <li>
                                    <a href="#special-editions"
                                        class="block px-4 py-2 hover:underline text-sm font-medium"
                                        role="menuitem">Mwinyi Housing Scheme(Kisaka Saka)</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div> --}}



        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @keydown.escape="open = false" type="button"
                class="inline-flex items-center space-x-1 hover:underline focus:outline-none" aria-haspopup="true"
                :aria-expanded="open.toString()">
                <span>Publications</span>
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Main Dropdown Menu -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute left-0 mt-1 w-56 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu" aria-label="Publications list">


                    <li>
                        <a href="#researches" target="_blank" rel="noopener noreferrer"
                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                            Magazines
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('announcement.index') }}" target="_blank" rel="noopener noreferrer"
                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                            Public Notice
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <a href="{{ route('news.index') }}" class="hover:underline">News</a>
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" @keydown.escape="open = false" type="button"
                class="inline-flex items-center space-x-1 hover:underline focus:outline-none" aria-haspopup="true"
                :aria-expanded="open.toString()">
                <span>Gallery</span>
                <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute left-0 mt-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu" aria-label="Site list">
                    <li>
                        <a href="" target="_blank" rel="noopener noreferrer"
                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                            Photos
                        </a>
                    </li>
                    <li>
                        <a href="" target="_blank" rel="noopener noreferrer"
                            class="block px-4 py-2 hover:underline text-sm font-medium" role="menuitem">
                            Videos
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <a href="{{ url('/contacts') }}" class="hover:underline">Contact</a>
        <a href="{{ route('pages.faqs') }}" class="hover:underline">FAQs</a>
    </div>
</nav>
