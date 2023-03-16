<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
    ];

//    protected $visible = [
//        'id',
//        'name',
////        'email',
//    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['is_admin'];

    public function getIsAdminAttribute()
    {
        return (bool) rand(0, 1);
    }

    public function getIsManagerAttribute()
    {
        return (bool) rand(0, 1);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'owner_id');
    }

    public function tasksNew()
    {
        return $this->hasMany(Task::class, 'owner_id')->new();
    }

    public function isAdmin()
    {
        //dd(auth()->user->id == 3);
        return $this->id == 3;
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'owner_id')->withDefault(['name' => 'Bad CO']);
    }
}
