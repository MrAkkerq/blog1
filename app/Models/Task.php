<?php

namespace App\Models;
use App\Events\TaskCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Mail;

class Task extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory;

    public $fillable = ['title', 'body', 'owner_id'];
//    public $quarded = [];

    protected $dispatchesEvents = [
        'created' => TaskCreated::class,
    ];

//    protected static function boot()
//    {
//        parent::boot();
//
//        static::created(function ($task) {
//
//        });
//    }

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

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
