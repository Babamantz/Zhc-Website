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
    public $poster;
    public $newsArray = [];
    public $videosArray = [];
    public $slides = [];
    public $announcementsValues = [];
    public $propertySwipers = [];
    public $onlineServices = [];

    public function mount()
    {
        // Fetch all data in parallel queries
        $news = News::orderBy("created_at", "desc")->take(3)->get(['id', 'slug', 'title', 'date', 'content', 'excerpt']);
        $properties = Property::with('media')->latest()->get(['id', 'title', 'excerpt', 'content']);
        $services = OnlineService::with('media')->latest()->get(['id', 'title', 'alt']);
        $videos = YoutubeVideo::latest()->limit(5)->pluck('url');
        $announcements = Announcement::take(5)->get(['id', 'type', 'title', 'created_at']);
        $heros = Hero::get(['id', 'title', 'slug']);
        $posterRecord = PosterAdvitising::latest()->first();

        // Transform services
        $this->onlineServices = $services->map(fn($service) => [
            "id" => $service->id,
            "title" => $service->title,
            "alt" => $service->alt,
            "logo" => $service->getFirstMediaUrl("logos")
        ])->toArray();

        // Transform properties
        $this->propertySwipers = $properties->map(fn($property) => [
            "id" => $property->id,
            "title" => $property->title,
            "excerpt" => $property->excerpt,
            "content" => $property->content,
            "property" => $property->getFirstMediaUrl("properties")
        ])->toArray();

        // Transform news with media
        $this->newsArray = $news->map(fn($currentNews) => [
            'id' => $currentNews->id,
            'slug' => $currentNews->slug,
            'title' => $currentNews->title,
            'date' => $currentNews->date,
            'content' => $currentNews->content,
            'excerpt' => $currentNews->excerpt,
            'images' => $currentNews->getMedia('news')->map(fn($media) => [
                'original' => $media->getUrl(),
                'thumb' => $media->getUrl('thumb'),
                'medium' => $media->getUrl('medium'),
                'full' => $media->getUrl('full'),
            ])->toArray(),
        ])->toArray();

        // Videos array
        $this->videosArray = $videos;

        // Transform announcements
        $this->announcementsValues = $announcements->map(fn($announcement) => [
            'type' => $announcement->type,
            'title' => $announcement->title,
            'date' => $announcement->created_at,
            'announcement' => $announcement->getFirstMediaUrl('announcements'),
        ])->toArray();

        // Poster
        $this->poster = $posterRecord?->getFirstMediaUrl('posters');

        // Transform hero slides
        $this->slides = $heros->map(fn($hero) => [
            'title' => $hero->title,
            'description' => $hero->slug,
            'images' => $hero->getMedia('hero_image')->map(fn($media) => $media->getUrl())->toArray(),
        ])->toArray();
    }

    public function render()
    {
        return view('livewire.index');
    }
}
