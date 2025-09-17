<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Magazine;
use Illuminate\Auth\Access\HandlesAuthorization;

class MagazinePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Magazine');
    }

    public function view(AuthUser $authUser, Magazine $magazine): bool
    {
        return $authUser->can('View:Magazine');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Magazine');
    }

    public function update(AuthUser $authUser, Magazine $magazine): bool
    {
        return $authUser->can('Update:Magazine');
    }

    public function delete(AuthUser $authUser, Magazine $magazine): bool
    {
        return $authUser->can('Delete:Magazine');
    }

    public function restore(AuthUser $authUser, Magazine $magazine): bool
    {
        return $authUser->can('Restore:Magazine');
    }

    public function forceDelete(AuthUser $authUser, Magazine $magazine): bool
    {
        return $authUser->can('ForceDelete:Magazine');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Magazine');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Magazine');
    }

    public function replicate(AuthUser $authUser, Magazine $magazine): bool
    {
        return $authUser->can('Replicate:Magazine');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Magazine');
    }

}