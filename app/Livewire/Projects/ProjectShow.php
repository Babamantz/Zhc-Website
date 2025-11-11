<?php

namespace App\Livewire\Projects;

use App\Models\News;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class ProjectShow extends Component
{
    public $project, $newsArray;

    public function mount($slug)
    {
        // Cache the specific project by slug
        $this->project = Cache::remember("project_{$slug}", now()->addDays(7), function () use ($slug) {
            return Project::where("slug", $slug)->firstOrFail();
        });

        // Cache all news for 7 days
        $news = Cache::remember('news_list', now()->addDays(7), function () {
            return News::latest('created_at')->take(5)->get();
        });

        $this->newsArray = $news->map(function ($currentNews) {
            return [
                'id'      => $currentNews->id,
                'slug'    => $currentNews->slug,
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
    }

    public function render()
    {
        return view('livewire.projects.project-show');
    }
}
