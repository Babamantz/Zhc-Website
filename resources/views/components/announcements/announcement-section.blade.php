<div>
  
  <div class="flex flex-row border-b-2 border-black-active">
    <div class="flex items-center bg-[#0A2C73] rounded-t-md text-cp-white">
      <span class="px-2"><i class="fa fa-bullhorn text-white fa-2x"></i></span>
      <h3 class="pr-2 text-white">Public Notice</h3>
    </div>
  </div>
  <div class="divide-y py-1">
    @foreach([
      ['label' => 'New', 'title' => 'ANNOUNCEMENT FOR THOSE CALLED FOR ORAL AND PRACTICAL INTERVIEWS', 'url' => '#', 'date' => '27 April, 2025', 'type' => 'label'],
      ['title' => 'RESULTS WITH UNIDENTIFIED INTERVIEW NUMBERS', 'url' => '#', 'date' => '27 April, 2025', 'type' => 'pdf'],
      ['title' => 'RESULTS FOR WRITTEN INTERVIEW', 'url' => '#', 'date' => '26 April, 2025', 'type' => 'pdf'],
      ['label' => 'New', 'title' => 'PUBLIC NOTICE ON OVERSTAYED GOODS', 'url' => '#', 'date' => '16 April, 2025', 'type' => 'label'],
      ['label' => 'New', 'title' => 'LIST OF OVERSTAYED GOODS', 'url' => '#', 'date' => '16 April, 2025', 'type' => 'label'],
    ] as $item)
      <x-announcements.announcement-item :item="$item" />
    @endforeach
  </div>
  <div class="flex justify-start items-center">
    <a href="/public-notice" class="md:mt-4 text-base text-yellow-600 border-b-2 border-transparent hover:border-black-active hover:text-black-active">
      View More <span><i class="fa fa-arrow-right"></i></span>
    </a>
  </div>
</div>
