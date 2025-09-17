<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\OnlineService;
use Illuminate\Auth\Access\HandlesAuthorization;

class OnlineServicePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:OnlineService');
    }

    public function view(AuthUser $authUser, OnlineService $onlineService): bool
    {
        return $authUser->can('View:OnlineService');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:OnlineService');
    }

    public function update(AuthUser $authUser, OnlineService $onlineService): bool
    {
        return $authUser->can('Update:OnlineService');
    }

    public function delete(AuthUser $authUser, OnlineService $onlineService): bool
    {
        return $authUser->can('Delete:OnlineService');
    }

    public function restore(AuthUser $authUser, OnlineService $onlineService): bool
    {
        return $authUser->can('Restore:OnlineService');
    }

    public function forceDelete(AuthUser $authUser, OnlineService $onlineService): bool
    {
        return $authUser->can('ForceDelete:OnlineService');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:OnlineService');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:OnlineService');
    }

    public function replicate(AuthUser $authUser, OnlineService $onlineService): bool
    {
        return $authUser->can('Replicate:OnlineService');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:OnlineService');
    }

}