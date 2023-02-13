<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    public $fillable = ['code', 'title', 'detail', 'body', 'published'];

    public function getRouteKeyName()
    {
        return 'code';
    }
}
