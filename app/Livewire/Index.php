<?php

namespace App\Livewire;

use App\Models\Announcement;
use App\Models\Hero;
use App\Models\YoutubeVideo;
use Livewire\Component;
use App\Models\PosterAdvitising;

class Index extends Component
{ 

    
  public $poster,$videosArray,$slides = [],$announcementsValues = [];

public function mount()
{
    
    // Get single poster
    $videos = YoutubeVideo::latest()->limit(5)->pluck('url');
    // dd($videos); 
    $this->videosArray = $videos;
    $record = PosterAdvitising::latest()->first();

    $announcements = Announcement::get();
     $this->announcementsValues = $announcements->map(function ($announcement) {
    return [ 
        'type'       => $announcement->type,
        'title'       => $announcement->title,
        'date'       => $announcement->created_at,
        'announcement'=> $announcement->getFirstMediaUrl('announcements'),
    ];
    });

    $this->poster = $record?->getFirstMediaUrl('posters');
    
    $heros = Hero::get();

    $this->slides = $heros->map(function ($hero) {
    return [
        'title'       => $hero->title,
        'description' => $hero->slug,
        'images'      => $hero->getMedia('hero_image')->map(function ($media) {
            return $media->getUrl(); // or ->getUrl() for original
        })->toArray(),
    ];
})->toArray();

}


    public function render()
    {
        return view('livewire.index');
    }

}
