<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\OurService;
use Illuminate\Auth\Access\HandlesAuthorization;

class OurServicePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:OurService');
    }

    public function view(AuthUser $authUser, OurService $ourService): bool
    {
        return $authUser->can('View:OurService');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:OurService');
    }

    public function update(AuthUser $authUser, OurService $ourService): bool
    {
        return $authUser->can('Update:OurService');
    }

    public function delete(AuthUser $authUser, OurService $ourService): bool
    {
        return $authUser->can('Delete:OurService');
    }

    public function restore(AuthUser $authUser, OurService $ourService): bool
    {
        return $authUser->can('Restore:OurService');
    }

    public function forceDelete(AuthUser $authUser, OurService $ourService): bool
    {
        return $authUser->can('ForceDelete:OurService');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:OurService');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:OurService');
    }

    public function replicate(AuthUser $authUser, OurService $ourService): bool
    {
        return $authUser->can('Replicate:OurService');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:OurService');
    }

}