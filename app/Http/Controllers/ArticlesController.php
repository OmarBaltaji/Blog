<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use App\Traits\Likable;

use Illuminate\Http\Request;
use Redirect;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->simplePaginate(5);

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {

        $comments = Comment::latest()->where('article_id', $article->id)->simplePaginate(5);
        return view('articles.show', ['article' => $article, 'comments' => $comments, 'user' => $article->user]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store() {

        $validate = $this->validateArticle();
        $validate['user_id'] = auth()->id();
        Article::create($validate);

        return redirect('/articles');
    }

    public function destroy($id)
    {

        Article::findOrFail($id)->delete();

        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect(route('articles.show', $article));
    }

    protected function validateArticle() {

        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
