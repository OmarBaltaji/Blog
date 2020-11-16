<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Article;
use App\Traits\Likable;
use Illuminate\Http\Request;

class ArticleLikeController extends Controller
{
    public function store(Article $article)
    {
        // header('Content-Type: application/json');
        // $body = file_get_contents('php://input');
        // $bodyDecoded = json_decode($body, true);
        // $user_id = $bodyDecoded['user_id'];
        // $article_id = $bodyDecoded['article_id'];

        // Like::create([$user_id, $article_id, true]);

        $article->like();
        // return json_encode(['Access']);
        return back();
    }

    public function destroy(Article $article)
    {
        $article->dislike();
        return back();
    }
}
