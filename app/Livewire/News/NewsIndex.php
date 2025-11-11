<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;

class NewsIndex extends Component
{
    use WithPagination;

    public $newsArray = [];
    public $announcementsValues = [];


    public function render()
    {

        $newsList = News::latest()->with('media')->paginate(5);

        $this->newsArray = $newsList->getCollection()->map(function ($currentNews) {
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

        $announcements = Announcement::take(5)->get();
        $this->announcementsValues = $announcements->map(function ($announcement) {
            return [
                'type'        => $announcement->type,
                'title'       => $announcement->title,
                'date'        => $announcement->created_at,
                'announcement' => $announcement->getFirstMediaUrl('announcements'),
            ];
        });

        return view('livewire.news.news-index', [
            'newsList' => $newsList
        ]);
    }
}
