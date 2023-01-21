<?php

namespace App\Models;

class Task extends Model
{
    public $fillable = ['title', 'body'];

    public function getRouteKey()
    {
        return 'id';
    }

//    public static function completed()
//    {
//        return static::where('completed', 1)->get();
//    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}
