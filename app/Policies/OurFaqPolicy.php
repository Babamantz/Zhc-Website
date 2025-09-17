<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\OurFaq;
use Illuminate\Auth\Access\HandlesAuthorization;

class OurFaqPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:OurFaq');
    }

    public function view(AuthUser $authUser, OurFaq $ourFaq): bool
    {
        return $authUser->can('View:OurFaq');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:OurFaq');
    }

    public function update(AuthUser $authUser, OurFaq $ourFaq): bool
    {
        return $authUser->can('Update:OurFaq');
    }

    public function delete(AuthUser $authUser, OurFaq $ourFaq): bool
    {
        return $authUser->can('Delete:OurFaq');
    }

    public function restore(AuthUser $authUser, OurFaq $ourFaq): bool
    {
        return $authUser->can('Restore:OurFaq');
    }

    public function forceDelete(AuthUser $authUser, OurFaq $ourFaq): bool
    {
        return $authUser->can('ForceDelete:OurFaq');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:OurFaq');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:OurFaq');
    }

    public function replicate(AuthUser $authUser, OurFaq $ourFaq): bool
    {
        return $authUser->can('Replicate:OurFaq');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:OurFaq');
    }

}