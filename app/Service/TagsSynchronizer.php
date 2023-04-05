<?php

namespace App\Service;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, $item)
    {
        $itemTags = $item->tags->keyBy('name');
        $syncIds = $itemTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($itemTags);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $item->tags()->sync($syncIds);
    }
}
