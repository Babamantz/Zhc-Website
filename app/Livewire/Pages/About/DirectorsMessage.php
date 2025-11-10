<?php

namespace App\Livewire\Pages\About;

use App\Models\News;
use App\Models\DirectorMessage;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class DirectorsMessage extends Component
{
    public $directorMessage;
    public $newsArray = [];

    public function mount()
    {
        // Cache director message (6 months)
        $this->directorMessage = Cache::remember('director_message', 15552000, function () {
            return DirectorMessage::with('media')->first();
        });

        // Cache latest news list (1 week)
        $news = Cache::remember('news_list', 604800, function () {
            return News::with('media')->orderBy('created_at', 'desc')->get();
        });

        // Map news to simple array for frontend
        $this->newsArray = $news->map(function ($currentNews) {
            return [
                'id'      => $currentNews->id,
                'slug'    => $currentNews->slug,
                'title'   => $currentNews->title,
                'date'    => $currentNews->date,
                'excerpt' => $currentNews->excerpt,
                'images'  => $currentNews->getMedia('news')->map(fn($media) => [
                    'original' => $media->getUrl(),
                    'thumb'    => $media->getUrl('thumb'),
                    'medium'   => $media->getUrl('medium'),
                ])->toArray(),
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.pages.about.directors-message');
    }
}
