<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use hasFactory;

    public $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function news()
    {
        return $this->morphedByMany(TheNew::class, 'taggable');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        return (new static)->has('news')->orWhereHas('articles', function ($query) {
            $query->where('published', true);
        })->get();
    }

    public function getId()
    {
        return $this->getArrayAttributeByKey('id');
    }
}
