@php
$contacts = [
    [
        'name' => 'Unguja',
        'email' => 'dept@example.com',
        'phone' => '+255 700 000 000'
    ],
    [
        'name' => 'Pemba',
        'email' => 'arusha@example.com',
        'phone' => '+255 711 111 111'
    ]
];
@endphp


<div class="flex flex-col">
    <x-page-header title="Contact" />

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6 p-3">
        
        {{-- LEFT COLUMN --}}
        <div class="col-span-1 bg-white rounded-xl shadow p-6">
            <div class="bg-[#0A2C73] text-white font-semibold px-4 py-2 rounded-t-lg -mx-6 -mt-6 mb-4">
                Director General
            </div>
            <div class="text-gray-700 space-y-2">
                <p>Zanzibar Housing Corporation,</p>
                <p>Postcode: 28 Edward Sokoine Drive, 11105 Mchafukoge,</p>
                <p>Darajani,Sonara Building, P.O.Box 273,</p>
                <p>Unguja,Zanzibar</p>
                <p>Tel: +255 24 000000</p>
            </div>

            <h3 class="mt-6 font-semibold text-gray-800">Working Hours (East African time)</h3>
            <table class="w-full mt-2 border text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="border px-3 py-2">Days</th>
                        <th class="border px-3 py-2">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-3 py-2">Monday</td>
                        <td class="border px-3 py-2">7:00 AM - 15:30 PM</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2">Tuesday</td>
                        <td class="border px-3 py-2">7:00 AM - 15:30 PM</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2">Wednesday</td>
                        <td class="border px-3 py-2">7:00 AM - 15:30 PM</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2">Thurday</td>
                        <td class="border px-3 py-2">7:00 AM - 15:30 PM</td>
                    </tr>
                    <tr>
                        <td class="border px-3 py-2">Friday</td>
                        <td class="border px-3 py-2">7:00 AM - 15:30 PM</td>
                    </tr>
                   
                    </tr>
                    <!-- Add more rows -->
                </tbody>
            </table>
        </div>

        {{-- RIGHT COLUMN --}}
        <div class="col-span-2 bg-white rounded-xl shadow p-6 relative">
            <h3 class="font-semibold text-gray-800 mb-4">Regional  Contacts</h3>

            <table class="w-full text-sm border">
                <tbody>
                    @foreach($contacts as $contact)
                        <tr x-data="{ open: false }" class="odd:bg-gray-50">
                            <td class="border px-3 py-2 w-12 text-center">
                                <button @click="open = !open" class="text-green-600 focus:outline-none">
                                    <i x-show="!open" class="fa fa-plus-circle"></i>
                                    <i x-show="open" class="fa fa-minus-circle"></i>
                                </button>
                            </td>
                            <td class="border px-3 py-2 font-medium">{{ $contact['name'] }}</td>
                        </tr>
                        <tr x-show="open" x-transition>
                            <td></td>
                            <td class="border px-3 py-2 text-gray-600 bg-gray-50">
                                <p><span class="font-semibold">Email:</span> {{ $contact['email'] }}</p>
                                <p><span class="font-semibold">Phone:</span> {{ $contact['phone'] }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- <a href="#"
               class="fixed bottom-6 right-6 bg-yellow-400 text-black font-semibold px-4 py-2 rounded-lg shadow flex items-center gap-2">
                <i class="fa fa-bell"></i>
                Staff Misconduct &amp; Tax Evasion
            </a> --}}
        </div>
    </div>
</div>
