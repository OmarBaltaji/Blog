<?php

namespace App\Traits;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Like;

trait Likable
{

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            ['user_id' => $user ? $user->id : auth()->id()],
            ['liked' => $liked]
        );
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function isLikedBy(User $user = null)
    {
        if ($user == null) {
            return;
        }
        return (bool) $user->likes->where('article_id', $this->id)->where('liked', true)->count();
    }


    public function isDislikedBy(User $user = null)
    {
        if ($user == null) {
            return;
        }
        return (bool) $user->likes->where('article_id', $this->id)->where('liked', false)->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function allLikes()
    {
        return $this->likes->where('liked', true)->count();
    }

    public function allDislikes()
    {
        return $this->likes->where('liked',false)->count();
    }

}
