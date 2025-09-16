<?php

namespace App\Livewire\Announcement;

use App\Models\News;
use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;

class AnnouncementIndex extends Component
{
    use WithPagination;

    public $newsArray = [];
    public $announcementsValues = [];
    public function render()
    {

        $announcementLists = Announcement::latest()->with('media')->get();

        $this->announcementsValues = $announcementLists->map(function ($announcementList) {
            return [
                'type'        => $announcementList->type,
                'title'       => $announcementList->title,
                'date'        => $announcementList->created_at,
                'announcement' => $announcementList->getFirstMediaUrl('announcements'),
            ];
        });

        $newsList = News::get();
        $this->newsArray = $newsList->map(function ($currentNews) {
            return [
                'id'      => $currentNews->id,
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
