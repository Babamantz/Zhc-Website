<div class="flex  flex-col">
    <x-page-header title="FREQUENTLY ASKED QUESTIONS" />

    {{-- Control div --}}

    {{-- Outer wrapper: 12-column grid --}}
    <div class="lg:grid lg:grid-cols-10 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10 --}}
        <div class="lg:col-span-6">
            {{-- Featured properties or custom grid goes here --}}
            <h1 class="text-2xl font-bold  border-b-2">FAQs</h1>


            <div class="flex flex-col">
                <div class="text-sm md:text-base my-3 mx-2">
                    <div x-data="faqPagination()" class="space-y-4">

                        <!-- FAQs List -->
                        <template x-for="(faq, index) in paginatedFaqs()" :key="index">
                            <div class="border rounded-lg shadow-sm">
                                <button @click="open === index ? open = null : open = index"
                                    class="w-full flex justify-between items-center px-4 py-3 bg-[#0A2C73] text-white font-medium">
                                    <span x-text="faq.header"></span>
                                    <span x-text="open === index ? '-' : '+'"></span>
                                </button>
                                <div x-show="open === index" x-collapse class="px-4 py-3 border-t bg-white"
                                    x-html="faq.content"></div>
                            </div>
                        </template>

                        <!-- Pagination Controls -->
                        <div class="flex justify-center space-x-2 mt-100">
                            <button @click="prevPage()" :disabled="currentPage === 1"
                                class="px-3 py-1 border rounded bg-gray-200 disabled:opacity-50">Prev</button>
                            <template x-for="page in totalPages()" :key="page">
                                <button @click="goToPage(page)"
                                    :class="{
                                        'bg-[#0A2C73] text-white': currentPage === page,
                                        'bg-gray-200': currentPage !==
                                            page
                                    }"
                                    class="px-3 py-1 border rounded">
                                    <span x-text="page"></span>
                                </button>
                            </template>
                            <button @click="nextPage()" :disabled="currentPage === totalPages()"
                                class="px-3 py-1 border rounded bg-gray-200 disabled:opacity-50">Next</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        {{-- Right column: col-span-2 --}}
        <div class="mt-8 lg:mt-0 lg:col-span-4">
            <x-news.news-header />

            @foreach ($newsArray as $item)
                <div class="mb-4 mt-2">
                    <div class="flex items-start gap-4 mb-4">
                        <!-- Image Section -->
                        <a href="{{ route('news.show', ['news' => $item['slug']]) }}" class="w-32 h-20 flex-shrink-0">
                            <img src="{{ $item['images'][0]['original'] }}" alt="{{ $item['title'] }}"
                                class="w-full h-full object-cover rounded-md" />
                        </a>

                        <!-- Content Section -->
                        <div class="flex flex-col justify-center">
                            <a href="{{ route('news.show', ['news' => $item['slug']]) }}"
                                class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                {{ $item['title'] }}
                            </a>
                            <div class="text-sm text-gray-600 mt-1 flex items-center">
                                <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                {{ \Carbon\Carbon::parse($item['date'])->format('d M, Y') }}
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>
<script>
    function faqPagination() {
        return {
            faqs: @json($faqsArray), // Pass your FAQs array from backend
            perPage: 5,
            currentPage: 1,
            open: 0, // <-- First FAQ visible by default

            // Computed: sliced FAQs for current page
            paginatedFaqs() {
                let start = (this.currentPage - 1) * this.perPage;
                let end = start + this.perPage;
                return this.faqs.slice(start, end);
            },

            // Total number of pages
            totalPages() {
                return Math.ceil(this.faqs.length / this.perPage);
            },

            // Pagination controls
            prevPage() {
                if (this.currentPage > 1) this.currentPage--;
                this.open = 0; // Reset to first FAQ on new page
            },
            nextPage() {
                if (this.currentPage < this.totalPages()) this.currentPage++;
                this.open = 0;
            },
            goToPage(page) {
                this.currentPage = page;
                this.open = 0;
            }
        }
    }
</script>
