<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\OurService;

class Service extends Component
{

    public $service,$servicesArray = [];
    public function mount()
    {
        $services = OurService::select(['header','content'])->get();
        $this->servicesArray =  $services->toArray();

        // dd($this->serviceArray);

    }
    public function render()
    {
        return view('livewire.pages.service');
    }
}
