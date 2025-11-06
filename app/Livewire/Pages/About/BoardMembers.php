<?php

namespace App\Livewire\Pages\About;

use Livewire\Component;
use App\Models\BoardMember;
use Illuminate\Support\Facades\Cache;

class BoardMembers extends Component
{
    public $levels = [];
    public function mount()
    {
        $board_members = BoardMember::orderBy("created_at", "desc")->get();

        $mapped = $board_members->map(function ($boardMember) {
            return [
                'id'      => $boardMember->id,
                'full_name'      => $boardMember->full_name,
                'role'    => $boardMember->role,
                'level'   => $boardMember->level,
                'images'  => $boardMember->getMedia('board_images')->map(function ($media) {
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
        return view('livewire.pages.about.board-members');
    }
}
