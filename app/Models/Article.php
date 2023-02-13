<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = ['code', 'title', 'detail', 'body', 'published'];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getId()
    {
        return $this->getArrayAttributeByKey('id');
    }
}
