<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use App\Models\Announcement;

class NewsIndex extends Component
{
     public $newsArray = [],$announcementsValues =[];
    public function mount()
    {
        $newsList = News::latest()->with('media')->get();
        $this->newsArray = $newsList->map(function ($currentNews) {
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

 $announcements = Announcement::get();
     $this->announcementsValues = $announcements->map(function ($announcement) {
    return [ 
        'type'       => $announcement->type,
        'title'       => $announcement->title,
        'date'       => $announcement->created_at,
        'announcement'=> $announcement->getFirstMediaUrl('announcements'),
    ];
    });
    
    }



    
    public function render()
    {
         
        return view('livewire.news.news-index');
    }
}
