<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    protected $fillable = ['user_id', 'task_id', 'element'];

    protected $touches = ['task'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
