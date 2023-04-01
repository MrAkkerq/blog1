<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Article $article)
    {
        return $article->owner_id == $user->id && $user->hasPermissionTo('update articles');
    }

    public function show(User $user, Article $article)
    {
//        return $article->isNotPublished() && $article->owner_id != $user->id;
        if ($article->isNotPublished() && $article->owner_id != $user->id && ! $user->hasRole('admin')) {
            return false;
        } elseif ($article->isNotPublished() || $article->isPublished()) {
            return true;
        }
    }

//    public function edit(User $user, Article $article)
//    {
//        return $article->owner_id == $user->id && $user->hasPermissionTo('edit articles');
//    }
}
