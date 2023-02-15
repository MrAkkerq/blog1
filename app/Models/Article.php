<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public $fillable = [
        'owner_id',
        'code',
        'title',
        'detail',
        'body',
        'published'
    ];

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
