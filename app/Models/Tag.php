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
        return $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        return (new static)->WhereHas('articles', function ($query) {
            $query->where('published', true);
        })->get();
    }

    public function getId()
    {
        return $this->getArrayAttributeByKey('id');
    }
}
