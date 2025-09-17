<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Photo;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Photo');
    }

    public function view(AuthUser $authUser, Photo $photo): bool
    {
        return $authUser->can('View:Photo');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Photo');
    }

    public function update(AuthUser $authUser, Photo $photo): bool
    {
        return $authUser->can('Update:Photo');
    }

    public function delete(AuthUser $authUser, Photo $photo): bool
    {
        return $authUser->can('Delete:Photo');
    }

    public function restore(AuthUser $authUser, Photo $photo): bool
    {
        return $authUser->can('Restore:Photo');
    }

    public function forceDelete(AuthUser $authUser, Photo $photo): bool
    {
        return $authUser->can('ForceDelete:Photo');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Photo');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Photo');
    }

    public function replicate(AuthUser $authUser, Photo $photo): bool
    {
        return $authUser->can('Replicate:Photo');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Photo');
    }

}