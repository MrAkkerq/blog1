<?php

namespace App\Models;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleting;
use App\Events\ArticleUpdating;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasFactory;
    use Notifiable;

    public $fillable = [
        'owner_id',
        'code',
        'title',
        'detail',
        'body',
        'published'
    ];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
        'updating' => ArticleUpdating::class,
        'deleting' => ArticleDeleting::class,
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function (Article $article) {
            $after = $article->getDirty();
            $article->history()->attach(auth()->id(), [
                'before' => json_encode(Arr::only($article->fresh()->toArray(), array_keys($after))),
                'after' => json_encode($after),
            ]);
        });
    }

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getId()
    {
        return $this->getArrayAttributeByKey('id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function routeNotificationForMail($notification)
    {
        return config('app.admin_email');
    }

    public function isPublished()
    {
        return (boolean) $this->published;
    }

    public function isNotPublished()
    {
        return ! $this->isPublished();
    }

    public function newCollection(array $models = [])
    {
        return new class($models) extends Collection
        {
            public function allPublished()
            {
                return $this->filter->isPublished();
            }

            public function allNotPublished()
            {
                return $this->filter->isNotPuplished();
            }

            public function publishedArticlesWithPeriod($dateFrom, $dateTo)
            {
                return $this
                    ->where('published', true)
                    ->where('created_at', '>=' , Carbon::parse($dateFrom))
                    ->where('created_at', '<', Carbon::parse($dateTo));
            }
        };
    }

    public function published($published = true)
    {
        $this->update(['published' => $published]);
    }

    public function inPublished()
    {
        $this->published(false);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class, 'article_comments')
            ->withPivot(['comment'])->withTimestamps();
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'histories')
            ->withPivot(['before', 'after'])->withTimestamps();
    }

//    public function addComment($attributes)
//    {
//        dd(123);
//        return $this->comments()->create($attributes);
//    }

//    public function setTag($tag)
//    {
//
//    }
}
