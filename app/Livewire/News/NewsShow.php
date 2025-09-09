<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use App\Models\Announcement;

class NewsShow extends Component
{
     public $news,$announcementsValues =[];
    public function mount($id)
    {
        $news = News::with('media')->findOrFail($id);

$this->news = [
    'id'      => $news->id,
    'title'   => $news->title,
    'date'    => $news->date,
    'content' => $news->content,
    'excerpt' => $news->excerpt,
    'images'  => $news->getMedia('news')->map(function ($media) {
        return [
            'original' => $media->getUrl(),
            'thumb'    => $media->getUrl('thumb'),
            'medium'   => $media->getUrl('medium'),
            'full'     => $media->getUrl('full'),
        ];
    })->toArray(),
];

       

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
        return view('livewire.news.news-show');
    }
}
