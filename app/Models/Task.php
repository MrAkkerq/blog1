<?php

namespace App\Models;
use App\Events\TaskCreated;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Mail;

class Task extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['title', 'body', 'owner_id', 'type'];
//    public $quarded = [];

    protected $dispatchesEvents = [
        'created' => TaskCreated::class,
    ];

    protected $attributes = [
        'type' => 'new',
    ];

    protected $appends = [
        'double_type'
    ];

    protected $dates = [
        'viewed_at'
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('onlyNew', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->new();
        });
    }

    public function getTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDoubleTypeAttribute()
    {
        return str_repeat($this->type, 2);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = ucfirst(strtolower($value));
    }

    public function getRouteKey()
    {
        return 'id';
    }

//    public static function completed()
//    {
//        return static::where('completed', 1)->get();
//    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeNew($query)
    {
        return $query->where('type', 'new');
    }

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

    public function isCompleted()
    {
        return (bool) $this->completed;
    }

    public function isNotCompleted()
    {
        return ! $this->isCompleted();
    }

    public function newCollection(array $models = [])
    {
        return new class($models) extends Collection {
            public function allCompleted()
            {
                return $this->filter->isCompleted();
            }

            public function allNotCompleted()
            {
                return $this->filter->isNotCompleted();
            }
        };
    }
}
