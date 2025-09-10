<?php

namespace App\Livewire\FAQS;

use App\Models\News;
use App\Models\OurFaq;
use Livewire\Component;

class Faq extends Component
{
     public $faqs,$faqsArray = [],$newsArray = [];
    public function mount()
    {
        $faqs = OurFaq::select(['header','content'])->get();
        $this->faqsArray =  $faqs->toArray();

        $news = News::orderBy("created_at","desc")->get();

    $this->newsArray = $news->map(function ($currentNews) {
    return [
        'id'      => $currentNews->id,
        'title'   => $currentNews->title,
        'date'    => $currentNews->date,
        'content' => $currentNews->content,
        'excerpt' => $currentNews->excerpt, // fixed typo (exerpt → excerpt)
        'images'  => $currentNews->getMedia('news')->map(function ($media) {
            return [
                'original' => $media->getUrl(),                // full-size original
                'thumb'    => $media->getUrl('thumb'),         // 400x300
                'medium'   => $media->getUrl('medium'),        // 800x600
                'full'     => $media->getUrl('full'),          // 1600x1200
            ];
        })->toArray(),
    ];
})->toArray();
    }


    public function render()
    {
        return view('livewire.f-a-q-s.faq');
    }
}
