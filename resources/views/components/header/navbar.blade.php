@php
    $completedProjects = App\Models\Project::where('status', 'Completed')->get();
    $ongoingProjects = App\Models\Project::where('status', 'Ongoing')->get();
    $upcomingProjects = App\Models\Project::where('status', 'Upcoming')->get();
@endphp
<nav {{ $attributes->merge(['class' => 'bg-[#F7931E] text-white']) }}>
    <div class="container  justify-center mx-auto px-6 py-4 space-x-4 hidden md:flex">

        <!-- Static links -->
        <a href="/" class="hover:underline rounded">Home</a>
        <a href="/services" class="hover:underline rounded">Services</a>
        <a href="{{ route('news.index') }}" class="hover:underline rounded">News</a>
        <a href="{{ url('/contacts') }}" class="hover:underline rounded">Contact</a>
        <a href="{{ route('pages.faqs') }}" class="hover:underline rounded">FAQs</a>

        <!-- About Dropdown -->
        <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
            <button @click="open = !open" class="inline-flex items-center space-x-1 hover:underline rounded"
                aria-haspopup="true" :aria-expanded="open.toString()">
                <span>About</span>
                <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" x-cloak @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="absolute left-0 mt-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu">
                    <li><a href="{{ url('/about/about_us') }}"
                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">About Zhc</a></li>
                    <li><a href="{{ url('/about/directors-message') }}"
                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Directors Message</a></li>
                    <li><a href="{{ url('/about/organization-structure') }}"
                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Organization Structure</a>
                    </li>
                    <li><a href="{{ url('/about/management') }}"
                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Management</a>
                    </li>
                    <li><a href="{{ url('/about/board-members') }}"
                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Board Members</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Projects Dropdown -->
        <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
            <button @click="open = !open" class="inline-flex items-center space-x-1 hover:underline rounded"
                aria-haspopup="true" :aria-expanded="open.toString()">
                <span>Projects</span>
                <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" x-cloak @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="absolute left-0 mt-1 w-56 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu">

                    <!-- Completed Projects -->
                    <li x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false"
                            class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium hover:bg-[#123b9b]">
                            Completed
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-90': subOpen }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div x-show="subOpen" x-cloak @click.away="subOpen = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-x-2"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-2"
                            class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] rounded shadow-lg z-30">
                            <ul class="py-1">
                                @foreach ($completedProjects as $project)
                                    <li><a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">
                                            {{ $project->title }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>

                    <!-- Ongoing Projects -->
                    <li x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false"
                            class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium hover:bg-[#123b9b]">
                            Ongoing
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-90': subOpen }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div x-show="subOpen" x-cloak @click.away="subOpen = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-x-2"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-2"
                            class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] rounded shadow-lg z-30">
                            <ul class="py-1">
                                @foreach ($ongoingProjects as $project)
                                    <li><a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">
                                            {{ $project->title }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <!-- Upcoming Projects -->
                    <li x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false"
                            class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium hover:bg-[#123b9b]">
                            Upcoming
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-90': subOpen }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div x-show="subOpen" x-cloak @click.away="subOpen = false"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-x-2"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-2"
                            class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] rounded shadow-lg z-30">
                            <ul class="py-1">
                                @foreach ($upcomingProjects as $project)
                                    <li><a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">
                                            {{ $project->title }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Publications Dropdown -->
        <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
            <button @click="open = !open" class="inline-flex items-center space-x-1 hover:underline rounded"
                aria-haspopup="true" :aria-expanded="open.toString()">
                <span>Publications</span>
                <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" x-cloak @click.away="open = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="absolute left-0 mt-1 w-56 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu">
                    <li><a href="#researches"
                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Magazines</a></li>
                    <li><a href="{{ route('announcement.index') }}"
                            class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Public Notice</a></li>
                </ul>
            </div>
        </div>

        <!-- Gallery Dropdown -->
        <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
            <button @click="open = !open" class="inline-flex items-center space-x-1 hover:underline rounded"
                aria-haspopup="true" :aria-expanded="open.toString()">
                <span>Gallery</span>
                <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div x-show="open" x-cloak @click.away="open = false"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                class="absolute left-0 mt-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                <ul class="py-1" role="menu">
                    <li><a href="/" class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Photos</a>
                    </li>
                    <li><a href="/" class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Videos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="nav-wrapper" x-data="{ open: false }">
        <div class="md:hidden flex items-center">
            <button @click="open = !open" class="focus:outline-none m-2 mx-5 p-1">
                <!-- Hamburger icon -->
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <div x-show="open" class="container justify-center mx-auto px-6 py-4 space-x-4 text-left  md:hidden">

            <!-- Static links -->
            <a href="/" class="hover:underline rounded block">Home</a>
            <a href="/services" class="hover:underline rounded block pt-0.5">Services</a>
            <a href="{{ route('news.index') }}" class="hover:underline rounded block pt-0.5">News</a>
            <a href="{{ url('/contacts') }}" class="hover:underline rounded block pt-0.5">Contact</a>
            <a href="{{ route('pages.faqs') }}" class="hover:underline rounded block pt-0.5">FAQs</a>

            <!-- About Dropdown -->
            <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
                <button @click="open = !open"
                    class="inline-flex items-center space-x-1 hover:underline rounded pt-0.5" aria-haspopup="true"
                    :aria-expanded="open.toString()">
                    <span>About</span>
                    <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-cloak @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute left-0 mt-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                    <ul class="py-1" role="menu">
                        <li><a href="{{ url('/about/about_us') }}"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">About Zhc</a></li>
                        <li><a href="{{ url('/about/directors-message') }}"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Directors Message</a>
                        </li>
                        <li><a href="{{ url('/about/organization-structure') }}"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Organization
                                Structure</a>
                        </li>
                        <li><a href="{{ url('/about/management') }}"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Management</a>
                        </li>
                        <li><a href="{{ url('/about/board-members') }}"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Board Members</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Projects Dropdown -->
            <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
                <button @click="open = !open"
                    class="inline-flex items-center space-x-1 hover:underline rounded pt-0.5" aria-haspopup="true"
                    :aria-expanded="open.toString()">
                    <span>Projects</span>
                    <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-cloak @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute left-0 mt-1 w-56 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                    <ul class="py-1" role="menu">

                        <!-- Completed Projects -->
                        <li x-data="{ subOpen: false }" class="relative">
                            <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false"
                                class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium hover:bg-[#123b9b]">
                                Completed
                                <svg class="w-4 h-4 transition-transform duration-200"
                                    :class="{ 'rotate-90': subOpen }" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <div x-show="subOpen" x-cloak @click.away="subOpen = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-x-2"
                                x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-x-0"
                                x-transition:leave-end="opacity-0 -translate-x-2"
                                class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] rounded shadow-lg z-30">
                                <ul class="py-1">
                                    @foreach ($completedProjects as $project)
                                        <li><a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">
                                                {{ $project->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>

                        <!-- Ongoing Projects -->
                        <li x-data="{ subOpen: false }" class="relative">
                            <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false"
                                class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium hover:bg-[#123b9b]">
                                Ongoing
                                <svg class="w-4 h-4 transition-transform duration-200"
                                    :class="{ 'rotate-90': subOpen }" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <div x-show="subOpen" x-cloak @click.away="subOpen = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-x-2"
                                x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-x-0"
                                x-transition:leave-end="opacity-0 -translate-x-2"
                                class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] rounded shadow-lg z-30">
                                <ul class="py-1">
                                    @foreach ($ongoingProjects as $project)
                                        <li><a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">
                                                {{ $project->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <!-- Upcoming Projects -->
                        <li x-data="{ subOpen: false }" class="relative">
                            <button @click="subOpen = !subOpen" @keydown.escape="subOpen = false"
                                class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium hover:bg-[#123b9b]">
                                Upcoming
                                <svg class="w-4 h-4 transition-transform duration-200"
                                    :class="{ 'rotate-90': subOpen }" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>

                            <div x-show="subOpen" x-cloak @click.away="subOpen = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-x-2"
                                x-transition:enter-end="opacity-100 translate-x-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-x-0"
                                x-transition:leave-end="opacity-0 -translate-x-2"
                                class="absolute top-0 left-full ml-1 w-48 bg-[#0A2C73] rounded shadow-lg z-30">
                                <ul class="py-1">
                                    @foreach ($ongoingProjects as $project)
                                        <li><a href="{{ route('projects.show', [$project->status, $project->slug]) }}"
                                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">
                                                {{ $project->title }}
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Publications Dropdown -->
            <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
                <button @click="open = !open"
                    class="inline-flex items-center space-x-1 hover:underline rounded pt-0.5" aria-haspopup="true"
                    :aria-expanded="open.toString()">
                    <span>Publications</span>
                    <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-cloak @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute left-0 mt-1 w-56 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                    <ul class="py-1" role="menu">
                        <li><a href="#researches"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Magazines</a></li>
                        <li><a href="{{ route('announcement.index') }}"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Public Notice</a></li>
                    </ul>
                </div>
            </div>

            <!-- Gallery Dropdown -->
            <div x-data="{ open: false }" class="relative" @keydown.escape="open = false">
                <button @click="open = !open"
                    class="inline-flex items-center space-x-1 hover:underline rounded pt-0.5" aria-haspopup="true"
                    :aria-expanded="open.toString()">
                    <span>Gallery</span>
                    <svg class="w-4 h-4 text-white transition-transform duration-200" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-cloak @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute left-0 mt-1 w-48 bg-[#0A2C73] text-white rounded shadow-lg z-20">
                    <ul class="py-1" role="menu">
                        <li><a href="#"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Photos</a>
                        </li>
                        <li><a href="#"
                                class="block px-4 py-2 hover:bg-[#123b9b] text-sm font-medium">Videos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</nav>
