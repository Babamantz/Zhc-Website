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
use Illuminate\Support\Facades\Cache;

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
        // Cache for 1 hour (3600 seconds) - adjust as needed
        $cacheTime = 3600;

        // Fetch online services with cache
        $this->onlineServices = Cache::remember('index.online_services', $cacheTime, function () {
            return OnlineService::with('media')->latest()->get(['id', 'title', 'alt'])
                ->map(fn($service) => [
                    "id" => $service->id,
                    "title" => $service->title,
                    "alt" => $service->alt,
                    "logo" => $service->getFirstMediaUrl("logos")
                ])->toArray();
        });

        // Fetch properties with cache
        $this->propertySwipers = Cache::remember('index.properties', $cacheTime, function () {
            return Property::with('media')->latest()->get(['id', 'title', 'excerpt', 'content'])
                ->map(fn($property) => [
                    "id" => $property->id,
                    "title" => $property->title,
                    "excerpt" => $property->excerpt,
                    "content" => $property->content,
                    "property" => $property->getFirstMediaUrl("properties")
                ])->toArray();
        });

        // Fetch news with cache
        $this->newsArray = Cache::remember('index.news', $cacheTime, function () {
            return News::orderBy("created_at", "desc")->take(3)
                ->get(['id', 'slug', 'title', 'date', 'content', 'excerpt'])
                ->map(fn($currentNews) => [
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
        });

        // Fetch videos with cache
        $this->videosArray = Cache::remember('index.videos', $cacheTime, function () {
            return YoutubeVideo::latest()->limit(5)->pluck('url')->toArray();
        });

        // Fetch announcements with cache
        $this->announcementsValues = Cache::remember('index.announcements', $cacheTime, function () {
            return Announcement::take(5)->get(['id', 'type', 'title', 'created_at'])
                ->map(fn($announcement) => [
                    'type' => $announcement->type,
                    'title' => $announcement->title,
                    'date' => $announcement->created_at,
                    'announcement' => $announcement->getFirstMediaUrl('announcements'),
                ])->toArray();
        });

        // Fetch poster with cache
        $this->poster = Cache::remember('index.poster', $cacheTime, function () {
            $posterRecord = PosterAdvitising::latest()->first();
            return $posterRecord?->getFirstMediaUrl('posters');
        });

        // Fetch hero slides with cache
        $this->slides = Cache::remember('index.hero_slides', $cacheTime, function () {
            return Hero::get(['id', 'title', 'slug'])
                ->map(fn($hero) => [
                    'title' => $hero->title,
                    'description' => $hero->slug,
                    'images' => $hero->getMedia('hero_image')->map(fn($media) => $media->getUrl())->toArray(),
                ])->toArray();
        });
    }

    public function render()
    {
        return view('livewire.index');
    }
}
