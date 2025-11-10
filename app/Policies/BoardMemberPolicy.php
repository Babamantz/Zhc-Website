<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\BoardMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoardMemberPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:BoardMember');
    }

    public function view(AuthUser $authUser, BoardMember $boardMember): bool
    {
        return $authUser->can('View:BoardMember');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:BoardMember');
    }

    public function update(AuthUser $authUser, BoardMember $boardMember): bool
    {
        return $authUser->can('Update:BoardMember');
    }

    public function delete(AuthUser $authUser, BoardMember $boardMember): bool
    {
        return $authUser->can('Delete:BoardMember');
    }

    public function restore(AuthUser $authUser, BoardMember $boardMember): bool
    {
        return $authUser->can('Restore:BoardMember');
    }

    public function forceDelete(AuthUser $authUser, BoardMember $boardMember): bool
    {
        return $authUser->can('ForceDelete:BoardMember');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:BoardMember');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:BoardMember');
    }

    public function replicate(AuthUser $authUser, BoardMember $boardMember): bool
    {
        return $authUser->can('Replicate:BoardMember');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:BoardMember');
    }

}