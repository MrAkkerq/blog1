<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = [
        'owner_id',
        'comment',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function (Comment $comment) {
            $comment->owner_id = auth()->id();
        });
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function articles()
    {
        return $this->morphMany(Article::class, 'commentable');
    }

    public function news()
    {
        return $this->morphMany(TheNew::class, 'commentable');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
