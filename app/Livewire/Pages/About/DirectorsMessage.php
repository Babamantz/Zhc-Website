<?php

namespace App\Livewire\Pages\About;

use App\Models\News;
use Livewire\Component;
use App\Models\DirectorMessage;

class DirectorsMessage extends Component
{

    public $directorMessage,$newsArray=[];
    public function mount()
    {

        $dMessage = DirectorMessage::first();
        
        $this->directorMessage = DirectorMessage::with('media')->first();

        
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
        return view('livewire.pages.about.directors-message');
    }
}
