<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store($id)
    {

        $attributes = request()->validate(['body' => 'required']);

        Comment::create([
            'user_id' => auth()->user()->id,
            'article_id' => $id,
            'body' => $attributes['body']
            ]);

        return back();
    }

    public function show(Comment $newcomment)
    {
        return view('articles.show', ['newComment' => $newcomment]);
    }

    public function destroy($id, $commentId)
    {
        $comment = Comment::find($commentId);
        $user = $comment->user_id;

        if ($user === auth()->id()){

            $comment->delete($commentId);
            return redirect('/articles/' . $id);
        }
    }
}
