@php
$data = [
    [
        'href' => '/news/tax-symposium-attracts-stakeholders',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/TRA-4A5A1397.JPG',
        'title' => 'TAX SYMPOSIUM ATTRACTS STAKEHOLDERS',
        'date' => '10 May, 2025',
        'excerpt' => 'Taxpayers who participated in the Tax symposium held on May 8, 2025, in Dar es Salaam...'
    ],
    [
        'href' => '/news/commissioner-general-mwenda-visits-the-speaker-of-tanzania-parliament',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/WhatsApp_Image_2025-05-06_at_11.12.19.jpeg',
        'title' => 'COMMISSIONER GENERAL MWENDA VISITS THE SPEAKER OF TANZANIA PARLIAMENT',
        'date' => '06 May, 2025',
    ],
    [
        'href' => '/news/tra-board-meeting',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/Picture_1.jpg',
        'title' => 'TRA BOARD MEETING',
        'date' => '09 April, 2025',
    ],
    [
        'href' => '/news/deputy-chief-qadi-pass-on-the-culture-of-paying-taxes-to-your-children',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/0T5A8922.jpg',
        'title' => 'DEPUTY CHIEF QADI: “PASS ON THE CULTURE OF PAYING TAXES TO YOUR CHILDREN”',
        'date' => '17 March, 2025',
    ],
    [
        'href' => '/news/deputy-chief-qadi-pass-on-the-culture-of-paying-taxes-to-your-children',
        'img' => 'https://www.tra.go.tz/images/uploads/news/featured_image/0T5A8922.jpg',
        'title' => 'DEPUTY CHIEF QADI: “PASS ON THE CULTURE OF PAYING TAXES TO YOUR CHILDREN”',
        'date' => '17 March, 2025',
    ],
];
@endphp

<div class="flex flex-col">
    <x-page-header title="" />
    <div class="lg:grid lg:grid-cols-11 lg:gap-6 flex flex-col mt-5 px-4 min-h-[80vh]">

    {{-- Left column: col-span-10  --}}
    <div class="lg:col-span-6">

<div x-data="tableHandler()" class="bg-white p-6 rounded-xl shadow">
  
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
        <input type="text" x-model="search" class="border rounded px-2 py-1 text-sm" placeholder="Search..." />
      </label>
    </div>
  </div>

  <!-- Table -->
  <div class="overflow-x-auto">
    <table class="w-full border border-gray-200 divide-y divide-gray-200 text-sm">
      <thead class="bg-gray-100">
        <tr>
          <th @click="sort('name')" class="px-4 py-2 text-left font-medium text-gray-700 cursor-pointer">
            Name <i class="fa fa-sort ml-1"></i>
          </th>
          <th @click="sort('date')" class="px-4 py-2 text-left font-medium text-gray-700 cursor-pointer">
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
              <span class="text-gray-900 font-medium" x-text="doc.name"></span>
            </td>
            <td class="px-4 py-2 text-gray-700" x-text="doc.date"></td>
            <td class="px-4 py-2 text-center">
              <a :href="doc.url" class="text-blue-600 hover:text-blue-800">
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
    <span x-text="`Showing ${startIndex()+1} to ${endIndex()} of ${filteredData().length} entries`"></span>
    <div class="space-x-2">
      <button @click="prevPage" :disabled="page===1"
        class="px-3 py-1 border rounded disabled:opacity-50">Prev</button>
      <button @click="nextPage" :disabled="endIndex() >= filteredData().length"
        class="px-3 py-1 border rounded disabled:opacity-50">Next</button>
    </div>
  </div>
</div>




    </div>
    
     {{-- <x-vertical-line thickness="2" color="black" /> --}}

     {{-- Right column: col-span-2 --}}
        <div class="lg:col-span-4">
              <x-news.news-header/>

            <x-news.section :data="$data" title="Recent Updates" :grid="false">
                <x-slot:items>
                    @foreach($data as $item)
                        <x-news.news-item 
                            :url="$item['href']" 
                            :image="$item['img']" 
                            :title="$item['title']" 
                            :date="$item['date']"
                        >
                            {{ $item['excerpt'] ?? '' }}
                        </x-news.news-item>
                    @endforeach
                </x-slot:items>
            </x-news.section>

        </div>
</div>
</div>


<script>
function tableHandler() {
  return {
    search: "",
    perPage: 10,
    page: 1,
    sortBy: 'name',
    sortAsc: true,
    data: [
      {id:1, name:"AMNESTY FOR OWNERS OF UNCUSTOMED VEHICLES", date:"01 August, 2025", url:"#"},
      {id:2, name:"HOTUBA YA WAZIRI WA FEDHA KUHUSU BAJETI YA SERIKALI 2025/26", date:"13 June, 2025", url:"#"},
      {id:3, name:"NEW SYSTEM FOR REGISTRATION MOTOR VEHICLES, MOTOR CYCLES AND ISSUANCE OF DRIVING LICENSES", date:"19 February, 2025", url:"#"},
      {id:4, name:"ONLINE RETURN AND PAYMENT FOR NON-RESIDENT ELECTRONIC SERVICE PROVIDERS/SUPPLIERS", date:"07 February, 2024", url:"#"},
      {id:5, name:"PUBLIC NOTICE ON TRANSIT GOODS", date:"28 May, 2024", url:"#"},
      {id:6, name:"SUBMISSION OF QUARTERLY RETURNS BY BENEFICIARIES UNDER EAST AFRICAN COMMUNITY DUTY REMISSION SCHEME", date:"01 August, 2025", url:"#"},
      {id:7, name:"TELEPHONE NUMBERS - TRANSIT GOODS AND OTHER GOODS UNDER CUSTOMS CONTROL", date:"01 December, 2024", url:"#"},
      {id:8, name:"USER MANUAL FOR MOTOR VEHICLE REGISTRATION", date:"19 February, 2025", url:"#"}
    ],
    filteredData() {
      return this.data.filter(d => d.name.toLowerCase().includes(this.search.toLowerCase()));
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
      return this.sortedData().slice((this.page-1)*this.perPage, this.page*this.perPage);
    },
    startIndex() {
      return (this.page-1)*this.perPage;
    },
    endIndex() {
      return Math.min(this.page*this.perPage, this.filteredData().length);
    },
    nextPage() { if(this.endIndex() < this.filteredData().length) this.page++; },
    prevPage() { if(this.page>1) this.page--; },
    sort(field) {
      if(this.sortBy === field) {
        this.sortAsc = !this.sortAsc;
      } else {
        this.sortBy = field;
        this.sortAsc = true;
      }
    }
  }
}
</script>
