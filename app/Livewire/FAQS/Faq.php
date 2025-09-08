<?php

namespace App\Livewire\FAQS;

use App\Models\OurFaq;
use Livewire\Component;

class Faq extends Component
{
     public $faqs,$faqsArray = [];
    public function mount()
    {
        $faqs = OurFaq::select(['header','content'])->get();
        $this->faqsArray =  $faqs->toArray();

        // dd($this->serviceArray);

    }


    public function render()
    {
        return view('livewire.f-a-q-s.faq');
    }
}
