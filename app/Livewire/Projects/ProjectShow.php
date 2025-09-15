<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectShow extends Component
{
    public $project;
    public function mount($slug)
    {
        $projectData = Project::where("slug", $slug)
            ->where("slug", $slug)
            ->firstOrFail();

        $this->project = $projectData;
    }
    public function render()
    {
        return view('livewire.projects.project-show');
    }
}
