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
        $projectData = Cache::remember('projects', 604800, function () use ($slug) {
            return Project::where("slug", $slug)
                ->where("slug", $slug)
                ->firstOrFail();
        });

        $this->project = $projectData;

        // $news = News::orderBy("created_at", "desc")->get();
        $news = Cache::remember('news_list', 604800, function () {
            return  News::orderBy("created_at", "desc")->get();
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
        return view('livewire.projects.project-show');
    }
}
