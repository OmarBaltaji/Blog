@extends('layouts.app')

@section('content')
<div class="create_article"><a style="color:rgb(162, 162, 226);" href="{{ route('articles.create') }}">Create an Article</a></div>

@if ($articles->count())
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <h2 class="articles_header">Latest Articles:</h2>
            <ul class="style1">
                @foreach ($articles as $article)
                    <li>

                        <h3>
                            <a style="color:violet" href=" {{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h3>

                        <p style="color: rgb(96, 207, 96); margin-left:7px">{{ $article->excerpt }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@else
      <h5 style="margin: 50px">No articles as of yet. Create one!</h5>
@endif

<div style="margin-left:500px; margin-top:50px;">
{{ $articles->links() }}
</div>
@endsection
