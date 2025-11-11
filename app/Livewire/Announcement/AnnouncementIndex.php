<?php

namespace App\Livewire\Announcement;

use App\Models\News;
use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class AnnouncementIndex extends Component
{
    use WithPagination;

    public $newsArray = [];
    public $announcementsValues = [];
    public function render()
    {

        $announcementLists = Cache::remember('announcements', 15552000, function () {
            return Announcement::latest()->with('media')->get();
        });

        $this->announcementsValues = $announcementLists->map(function ($announcementList) {
            return [
                'id' => $announcementList->id,
                'type'        => $announcementList->type,
                'title'       => $announcementList->title,
                'date'        => $announcementList->created_at,
                'announcement' => $announcementList->getFirstMediaUrl('announcements'),
            ];
        });

        $newsList = Cache::remember('news_list', 604800, function () {
            return News::take(5)->get();
        });
        $this->newsArray = $newsList->map(function ($currentNews) {
            return [
                'id'      => $currentNews->id,
                'slug'      => $currentNews->slug,
                'title'   => $currentNews->title,
                'date'    => $currentNews->date,
                'content' => $currentNews->content,
                'excerpt' => $currentNews->excerpt,
                'images'  => $currentNews->getMedia('news')->map(function ($media) {
                    return [
                        'original' => $media->getUrl(),
                        'thumb'    => $media->getUrl('thumb'),
                        'medium'   => $media->getUrl('medium'),
                        'full'     => $media->getUrl('full'),
                    ];
                })->toArray(),
            ];
        })->toArray();

        return view('livewire.announcement.announcement-index', [
            'announcementValues' => $this->announcementsValues
        ]);
    }
}
