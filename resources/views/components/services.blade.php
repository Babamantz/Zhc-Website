<div x-data="{
    open: 0, // <-- first service open by default
    services: {{ json_encode($services) }},
    perPage: 3,
    currentPage: 1,
    get totalPages() {
        return Math.ceil(this.services.length / this.perPage);
    },
    get paginatedServices() {
        let start = (this.currentPage - 1) * this.perPage;
        return this.services.slice(start, start + this.perPage);
    },
    init() {
        // ensure first service on the current page is open
        this.open = 0;
    },
    changePage(page) {
        this.currentPage = page;
        this.open = 0; // open first service on the new page
    },
    toggle(index) {
        this.open = this.open === index ? null : index;
    }
}" x-init="init()" class="space-y-4">

    <!-- Services Accordion -->
    <template x-for="(service, index) in paginatedServices" :key="index">
        <div class="border rounded-lg shadow-sm">
            <button @click="toggle(index)"
                class="w-full flex justify-between items-center text-white px-4 py-3 bg-[#0A2C73] font-semibold">
                <span x-html="service.header || '<span class=&quot;italic text-gray-300&quot;>No title</span>'"></span>
                <span x-text="open === index ? '-' : '+'"></span>
            </button>

            <div x-show="open === index" class="px-4 py-3 border-t bg-white" x-html="service.content"></div>
        </div>
    </template>

    <!-- Pagination Controls -->
    <div class="flex justify-center items-center gap-3 mt-90">
        <button @click="if(currentPage > 1){ currentPage--; open = 0 }" :disabled="currentPage === 1"
            class="px-3 border py-1 bg-gray-200 rounded disabled:opacity-50">
            Prev
        </button>

        <template x-for="page in totalPages" :key="page">
            <button @click="changePage(page)"
                :class="{ 'bg-[#0A2C73]  text-white': page === currentPage, 'bg-gray-200': page !== currentPage }"
                class="px-3 py-1 rounded" x-text="page"></button>
        </template>

        <button @click="if(currentPage < totalPages){ currentPage++; open = 0 }" :disabled="currentPage === totalPages"
            class="px-3 py-1 border  bg-gray-200 rounded disabled:opacity-50">
            Next
        </button>
    </div>
</div>
