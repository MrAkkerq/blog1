<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheNew extends Model
{
    use HasFactory;

    protected $fillable = ['hidden'];

    public function isHidden(): bool
    {
        return (boolean) $this->hidden;
    }

    public function isNotHidden(): bool
    {
        return ! $this->isHidden();
    }

    public function hidden($hidden = true)
    {
        $this->update(['hidden' => $hidden]);
    }

    public function inHidden()
    {
        $this->hidden(false);
    }
}
