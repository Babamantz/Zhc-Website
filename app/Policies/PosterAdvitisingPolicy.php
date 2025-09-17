<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\PosterAdvitising;
use Illuminate\Auth\Access\HandlesAuthorization;

class PosterAdvitisingPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:PosterAdvitising');
    }

    public function view(AuthUser $authUser, PosterAdvitising $posterAdvitising): bool
    {
        return $authUser->can('View:PosterAdvitising');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:PosterAdvitising');
    }

    public function update(AuthUser $authUser, PosterAdvitising $posterAdvitising): bool
    {
        return $authUser->can('Update:PosterAdvitising');
    }

    public function delete(AuthUser $authUser, PosterAdvitising $posterAdvitising): bool
    {
        return $authUser->can('Delete:PosterAdvitising');
    }

    public function restore(AuthUser $authUser, PosterAdvitising $posterAdvitising): bool
    {
        return $authUser->can('Restore:PosterAdvitising');
    }

    public function forceDelete(AuthUser $authUser, PosterAdvitising $posterAdvitising): bool
    {
        return $authUser->can('ForceDelete:PosterAdvitising');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:PosterAdvitising');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:PosterAdvitising');
    }

    public function replicate(AuthUser $authUser, PosterAdvitising $posterAdvitising): bool
    {
        return $authUser->can('Replicate:PosterAdvitising');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:PosterAdvitising');
    }

}