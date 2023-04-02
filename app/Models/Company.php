<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $fillable = ['name', 'owner_id'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'owner_id');
    }

    public function logo()
    {
        return $this->morphOne(\App\Models\Image::class, 'imageable');
    }
}
