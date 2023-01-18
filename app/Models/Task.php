<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

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
