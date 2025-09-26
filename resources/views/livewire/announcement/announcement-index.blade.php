<div class="flex flex-col">
    <x-page-header title="" />
    <div class="lg:grid lg:grid-cols-11 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

        {{-- Left column: col-span-10  --}}
        <div class="lg:col-span-6">

            <h1 class="text-2xl font-bold  border-b-2">Public Notice</h1>




            {{-- @dd($announcementsValues) --}}
            <div x-data="tableHandler({{ Js::from($announcementValues) }})" class="bg-white p-6 rounded-xl shadow">

                <!-- Search + Entries Control -->
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <label class="text-sm">Show
                            <select x-model="perPage" class="border rounded px-2 py-1 text-sm">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                            </select>
                            entries
                        </label>
                    </div>

                    <div>
                        <label class="text-sm">Search:
                            <input type="text" x-model="search" class="border rounded px-2 py-1 text-sm"
                                placeholder="Search..." />
                        </label>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th @click="sort('title')"
                                    class="px-4 py-2 text-left font-medium text-gray-700 cursor-pointer">
                                    Name <i class="fa fa-sort ml-1"></i>
                                </th>
                                <th @click="sort('date')"
                                    class="px-4 py-2 text-left font-medium text-gray-700 cursor-pointer">
                                    Published On <i class="fa fa-sort ml-1"></i>
                                </th>
                                <th class="px-4 py-2 text-center font-medium text-gray-700">Download</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <template x-for="doc in paginatedData()" :key="doc.id">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 flex items-center gap-2">
                                        <i class="fa fa-file-pdf text-red-600 fa-lg"></i>
                                        <span class="text-gray-900 font-medium" x-text="doc.title"></span>
                                    </td>
                                    <td class="px-4 py-2 text-gray-700"
                                        x-text="new
                                        Date(doc.date).toLocaleDateString('en-US', { day: '2-digit' , month: 'short' ,
                                        year: 'numeric' })">
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a :href="doc.announcement" target="_blank"
                                            class="text-blue-600 hover:text-blue-800">
                                            <i class="fa fa-download fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4 text-sm">
                    <span
                        x-text="`Showing ${startIndex()+1} to ${endIndex()} of ${filteredData().length} entries`"></span>
                    <div class="space-x-2">
                        <button @click="prevPage" :disabled="page === 1"
                            class="px-3 py-1 border rounded disabled:opacity-50">Prev</button>
                        <button @click="nextPage" :disabled="endIndex() >= filteredData().length"
                            class="px-3 py-1 border rounded disabled:opacity-50">Next</button>
                    </div>
                </div>
            </div>




        </div>

        {{-- <x-vertical-line thickness="2" color="black" /> --}}

        {{-- Right column: col-span-2 --}}
            <div class="hidden md:block md:col-span-4">
                <x-news.news-header />



                @foreach ($newsArray as $item)
                    <div class="mb-4 mt-2">
                        <div class="flex items-start gap-4 mb-4">
                            <!-- Image Section -->
                            <a href="{{ route('news.show', ['id' => $item['id']]) }}" class="w-32 h-20 flex-shrink-0">
                                @unless (empty($item['images'][0]['original']))
                                    <img src="{{ $item['images'][0]['original'] }}"
                                        alt="{{ $item['title'] ?? 'News Image' }}"
                                        class="w-full h-full object-cover rounded-md" />
                                @endunless
                            </a>

                            <!-- Content Section -->
                            <div class="flex flex-col justify-center">
                                <a href="{{ route('news.show', ['id' => $item['id']]) }}"
                                    class="uppercase font-semibold text-sm text-gray-800 hover:text-blue-600">
                                    {{ $item['title'] ?? 'Untitled News' }}
                                </a>

                                <div class="text-sm text-gray-600 mt-1 flex items-center">
                                    <i class="fa fa-calendar mr-1 text-gray-500"></i>
                                    @unless (empty($item['date']))
                                        {{ \Carbon\Carbon::parse($item['date'])->format('y-M-Y') }}
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


    <script>
        function tableHandler(announcementDatas) {
            console.log(announcementDatas);

            return {
                search: "",
                perPage: 10,
                page: 1,
                sortBy: 'title',
                sortAsc: true,
                data: announcementDatas,
                filteredData() {
                    return this.data.filter(d => d.title.toLowerCase().includes(this.search.toLowerCase()));
                },
                sortedData() {
                    return this.filteredData().sort((a, b) => {
                        let valA = a[this.sortBy].toLowerCase();
                        let valB = b[this.sortBy].toLowerCase();
                        if (valA < valB) return this.sortAsc ? -1 : 1;
                        if (valA > valB) return this.sortAsc ? 1 : -1;
                        return 0;
                    });
                },
                paginatedData() {
                    return this.sortedData().slice((this.page - 1) * this.perPage, this.page * this.perPage);
                },
                startIndex() {
                    return (this.page - 1) * this.perPage;
                },
                endIndex() {
                    return Math.min(this.page * this.perPage, this.filteredData().length);
                },
                nextPage() {
                    if (this.endIndex() < this.filteredData().length) this.page++;
                },
                prevPage() {
                    if (this.page > 1) this.page--;
                },
                sort(field) {
                    if (this.sortBy === field) {
                        this.sortAsc = !this.sortAsc;
                    } else {
                        this.sortBy = field;
                        this.sortAsc = true;
                    }
                }
            }
        }
    </script>
