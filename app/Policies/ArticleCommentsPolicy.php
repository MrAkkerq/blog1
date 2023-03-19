<?php

namespace App\Policies;

use App\Models\ArticleComments;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticleCommentsPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, ArticleComments $articleComments): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, ArticleComments $articleComments): bool
    {
    }

    public function delete(User $user, ArticleComments $articleComments): bool
    {
    }

    public function restore(User $user, ArticleComments $articleComments): bool
    {
    }

    public function forceDelete(User $user, ArticleComments $articleComments): bool
    {
    }
}
