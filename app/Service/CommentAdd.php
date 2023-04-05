<?php

namespace App\Service;

use Illuminate\Support\Collection;

class CommentAdd
{
    public function push(array $comment, $item)
    {
        $item->comments()->create($comment);
    }

}
