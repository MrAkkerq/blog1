<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Step extends Model
{
    use HasFactory;

    protected $fillable = ['completed', 'task_id', 'description'];

    protected $touches = ['task'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function complete($completed = true)
    {
        $this->update(['completed' => $completed]);
    }

    public function incomplete()
    {
        $this->complete(false);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function scopeCompleted($query)
    {
        return $query->where('completed', true);
    }

    public function owner()
    {
        return $this->hasOneThrough(User::class, Task::class, 'id', 'id','task_id', 'owner_id');
    }
}
