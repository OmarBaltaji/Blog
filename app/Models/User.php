<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Like;
use App\Models\Comment;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use  Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){

        $this->attributes['password'] = Hash::needsRehash($password)
        ? Hash::make($password) : $password;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
