<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Traits\Likable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Likable;

    protected $fillable = [
        'user_id',
        'title',
        'excerpt',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

}
