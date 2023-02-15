<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    public $fillable = ['title', 'body', 'owner_id'];
//    public $quarded = [];

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

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function addStep($attributes)
    {
        return $this->steps()->create($attributes);
    }
}
