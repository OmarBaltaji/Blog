@extends('layouts.app')

@section('content')

<div style="margin-bottom: 40px; margin-left:90px">
    <p class="home_header">
        <a style="color:rgb(162, 162, 226); font-weight:bolder" href="/articles">Home</a>
    </p>
</div>
    <div id='wrapper'>
        <div id='page' class="container">
            <h1 class="new_article"> Edit Article</h1>

            <form method="POST" action="/articles/{{ $article->id }}">

                @csrf
                @method('PUT')

                <div class="field">

                    <label class="new_article_headers" for="title">Title</label>

                    <div class="control" style="margin-bottom:20px">
                        <input class="input @error('title') is-danger @enderror" type="text" name="title"
                        id="title" value="{{  $article->title  }}"
                        style="width: 90%">

                        @error('title')
                        <p style="color:rgba(255, 0, 0, 0.801)">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>

                </div>

                <div class="field">

                    <label class="new_article_headers" for="excerpt">Excerpt</label>

                    <div class="control" style="margin-bottom:20px">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" name="excerpt" id="excerpt"
                        style="width: 90%; resize:none"  rows="3">{{ $article->excerpt }}</textarea>

                        @error('excerpt')
                            <p style="color:rgba(255, 0, 0, 0.801)">{{ $errors->first('excerpt') }}</p>
                        @enderror
                    </div>

                </div>

                <div class="field">

                    <label class="new_article_headers" for="body">Body</label>

                    <div class="control" style="margin-bottom:20px">
                        <textarea class="textarea @error('body') is-danger @enderror" name="body" id="body"
                        rows="7" style="width: 90%; resize:none">{{ $article->body }}</textarea>

                        @error('body')
                        <p style="color:rgba(255, 0, 0, 0.801)">{{ $errors->first('body') }}</p>
                    @enderror
                    </div>

                </div>

                <div class="field is-grouped">

                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
