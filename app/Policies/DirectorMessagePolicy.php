<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\DirectorMessage;
use Illuminate\Auth\Access\HandlesAuthorization;

class DirectorMessagePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:DirectorMessage');
    }

    public function view(AuthUser $authUser, DirectorMessage $directorMessage): bool
    {
        return $authUser->can('View:DirectorMessage');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:DirectorMessage');
    }

    public function update(AuthUser $authUser, DirectorMessage $directorMessage): bool
    {
        return $authUser->can('Update:DirectorMessage');
    }

    public function delete(AuthUser $authUser, DirectorMessage $directorMessage): bool
    {
        return $authUser->can('Delete:DirectorMessage');
    }

    public function restore(AuthUser $authUser, DirectorMessage $directorMessage): bool
    {
        return $authUser->can('Restore:DirectorMessage');
    }

    public function forceDelete(AuthUser $authUser, DirectorMessage $directorMessage): bool
    {
        return $authUser->can('ForceDelete:DirectorMessage');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:DirectorMessage');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:DirectorMessage');
    }

    public function replicate(AuthUser $authUser, DirectorMessage $directorMessage): bool
    {
        return $authUser->can('Replicate:DirectorMessage');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:DirectorMessage');
    }

}