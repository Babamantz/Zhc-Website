<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;
use App\Models\Management as ModelManagement;

class Management extends Component
{

    public $levels = [];
    public function mount()
    {
        $management_members = ModelManagement::orderBy("created_at", "desc")->get();

        $mapped = $management_members->map(function ($boardMember) {
            return [
                'id'      => $boardMember->id,
                'full_name'      => $boardMember->full_name,
                'role'    => $boardMember->role,
                'title'    => $boardMember->role,
                'level'   => $boardMember->level,
                'images'  => $boardMember->getMedia('management_images')->map(function ($media) {
                    return [
                        'original' => $media->getUrl(),
                        'thumb'   => $media->getUrl('thumb'),
                    ];
                })->toArray(),
            ];
        });

        $this->levels = [
            'level_one'   => $mapped->where('level', 'level_one')->values(),
            'level_two'   => $mapped->where('level', 'level_two')->values(),
            'level_three' => $mapped->where('level', 'level_three')->values(),
        ];
    }
    public function render()
    {
        return view('livewire.pages.about.management');
    }
}
