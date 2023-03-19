<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleComments extends Model
{
    protected $fillable = ['user_id', 'article_id', 'comment'];

    public function article()
    {
        $this->belongsTo(Article::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }

}
