<?php

namespace App\Livewire\Pages\About;

use App\Models\News;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class OrganizationStructure extends Component
{
    public $directorMessage, $newsArray = [];
    public function mount()
    {

        $news = Cache::remember('news_list', 604800, function () {
            News::orderBy("created_at", "desc")->get();
        });

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
    }
    public function render()
    {
        return view('livewire.pages.about.organization-structure');
    }
}
