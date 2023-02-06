<?php

namespace App\Models;

class Task extends \Illuminate\Database\Eloquent\Model
{
    public $fillable = ['title', 'body'];
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

    public function addStep($attributes)
    {
//        $attributes['task_id'] = $this->id;
//        return Step::create($attributes);
        return $this->steps()->create($attributes);
    }
}
