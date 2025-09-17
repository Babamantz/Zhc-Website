<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Structure;
use Illuminate\Auth\Access\HandlesAuthorization;

class StructurePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Structure');
    }

    public function view(AuthUser $authUser, Structure $structure): bool
    {
        return $authUser->can('View:Structure');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Structure');
    }

    public function update(AuthUser $authUser, Structure $structure): bool
    {
        return $authUser->can('Update:Structure');
    }

    public function delete(AuthUser $authUser, Structure $structure): bool
    {
        return $authUser->can('Delete:Structure');
    }

    public function restore(AuthUser $authUser, Structure $structure): bool
    {
        return $authUser->can('Restore:Structure');
    }

    public function forceDelete(AuthUser $authUser, Structure $structure): bool
    {
        return $authUser->can('ForceDelete:Structure');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Structure');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Structure');
    }

    public function replicate(AuthUser $authUser, Structure $structure): bool
    {
        return $authUser->can('Replicate:Structure');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Structure');
    }

}