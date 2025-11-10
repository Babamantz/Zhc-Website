<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Management;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagementPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Management');
    }

    public function view(AuthUser $authUser, Management $management): bool
    {
        return $authUser->can('View:Management');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Management');
    }

    public function update(AuthUser $authUser, Management $management): bool
    {
        return $authUser->can('Update:Management');
    }

    public function delete(AuthUser $authUser, Management $management): bool
    {
        return $authUser->can('Delete:Management');
    }

    public function restore(AuthUser $authUser, Management $management): bool
    {
        return $authUser->can('Restore:Management');
    }

    public function forceDelete(AuthUser $authUser, Management $management): bool
    {
        return $authUser->can('ForceDelete:Management');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Management');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Management');
    }

    public function replicate(AuthUser $authUser, Management $management): bool
    {
        return $authUser->can('Replicate:Management');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Management');
    }

}