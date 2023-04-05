<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $fillable = [
        'owner_id',
        'comment',
    ];

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
