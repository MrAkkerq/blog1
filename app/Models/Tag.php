<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = ['name'];

    public function tasks()
    {
        return $this->morphedByMany(Task::class, 'taggable');
    }

    public function steps()
    {
        return $this->morphedByMany(Step::class, 'taggable');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        return (new static)->has('tasks')->get();
    }
}
