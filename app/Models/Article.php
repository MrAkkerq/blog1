<?php

namespace App\Models;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleting;
use App\Events\ArticleUpdating;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

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

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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
        };
    }
}
