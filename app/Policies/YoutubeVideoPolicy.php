<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\YoutubeVideo;
use Illuminate\Auth\Access\HandlesAuthorization;

class YoutubeVideoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:YoutubeVideo');
    }

    public function view(AuthUser $authUser, YoutubeVideo $youtubeVideo): bool
    {
        return $authUser->can('View:YoutubeVideo');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:YoutubeVideo');
    }

    public function update(AuthUser $authUser, YoutubeVideo $youtubeVideo): bool
    {
        return $authUser->can('Update:YoutubeVideo');
    }

    public function delete(AuthUser $authUser, YoutubeVideo $youtubeVideo): bool
    {
        return $authUser->can('Delete:YoutubeVideo');
    }

    public function restore(AuthUser $authUser, YoutubeVideo $youtubeVideo): bool
    {
        return $authUser->can('Restore:YoutubeVideo');
    }

    public function forceDelete(AuthUser $authUser, YoutubeVideo $youtubeVideo): bool
    {
        return $authUser->can('ForceDelete:YoutubeVideo');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:YoutubeVideo');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:YoutubeVideo');
    }

    public function replicate(AuthUser $authUser, YoutubeVideo $youtubeVideo): bool
    {
        return $authUser->can('Replicate:YoutubeVideo');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:YoutubeVideo');
    }

}