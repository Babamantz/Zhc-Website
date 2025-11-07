<?php

namespace App\Livewire;

use App\Models\Hero;
use App\Models\News;
use App\Models\OnlineService;
use Livewire\Component;
use App\Models\Property;
use App\Models\Announcement;
use App\Models\YoutubeVideo;
use App\Models\PosterAdvitising;

class Index extends Component
{


    public $poster, $news, $newsArray = [], $videosArray, $slides = [], $announcementsValues = [], $propertySwipers = [], $onlineServices = [];

    public function mount()
    {
        $news = News::orderBy("created_at", "desc")->get();

        $properties = Property::with("media")->latest()->get();
        $services = OnlineService::with("media")->latest()->get();

        $this->onlineServices = $services->map(function ($service) {
            return [
                "id" => $service->id,
                "title" => $service->title,
                "alt" => $service->alt,
                "logo" => $service->getFirstMediaUrl("logos")
            ];
        })->toArray();


        $this->propertySwipers = $properties->map(function ($propertySwipers) {
            return [
                "id" => $propertySwipers->id,
                "title" => $propertySwipers->title,
                "excerpt" => $propertySwipers->excerpt,
                "content" => $propertySwipers->content,
                "property" => $propertySwipers->getFirstMediaUrl("properties")
            ];
        })->toArray();

        $this->newsArray = $news->map(function ($currentNews) {
            return [
                'id'      => $currentNews->id,
                'slug'      => $currentNews->slug,
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

        // dd($this->newsArray);


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
                'announcement' => $announcement->getFirstMediaUrl('announcements'),
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
