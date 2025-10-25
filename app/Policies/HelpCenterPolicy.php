<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\HelpCenter;
use Illuminate\Auth\Access\HandlesAuthorization;

class HelpCenterPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:HelpCenter');
    }

    public function view(AuthUser $authUser, HelpCenter $helpCenter): bool
    {
        return $authUser->can('View:HelpCenter');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:HelpCenter');
    }

    public function update(AuthUser $authUser, HelpCenter $helpCenter): bool
    {
        return $authUser->can('Update:HelpCenter');
    }

    public function delete(AuthUser $authUser, HelpCenter $helpCenter): bool
    {
        return $authUser->can('Delete:HelpCenter');
    }

    public function restore(AuthUser $authUser, HelpCenter $helpCenter): bool
    {
        return $authUser->can('Restore:HelpCenter');
    }

    public function forceDelete(AuthUser $authUser, HelpCenter $helpCenter): bool
    {
        return $authUser->can('ForceDelete:HelpCenter');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:HelpCenter');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:HelpCenter');
    }

    public function replicate(AuthUser $authUser, HelpCenter $helpCenter): bool
    {
        return $authUser->can('Replicate:HelpCenter');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:HelpCenter');
    }

}