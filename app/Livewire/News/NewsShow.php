<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use App\Models\Announcement;

class NewsShow extends Component
{
    public $news;
    public $announcementsValues = [];

    public function mount(News $news)

    {
        // dd($news);
        // Eager load media in one go
        $news->load('media');

        $this->news = [
            'id'      => $news->id,
            'slug'    => $news->slug,
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

        // Consider eager loading media here too for better performance
        $this->announcementsValues = Announcement::with('media')
            ->get()
            ->map(function ($announcement) {
                return [
                    'type'         => $announcement->type,
                    'title'        => $announcement->title,
                    'date'         => $announcement->created_at->format('Y-m-d'), // Format the date
                    'announcement' => $announcement->getFirstMediaUrl('announcements'),
                ];
            })->toArray(); // Add toArray() for consistency
    }

    public function render()
    {
        return view('livewire.news.news-show');
    }
}
