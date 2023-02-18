<?php

namespace App\Models;

use App\Events\ArticleCreated;
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
}
