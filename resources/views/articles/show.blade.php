@extends('layouts.app')

@section('content')

<div style="margin-bottom: 40px; margin-left:90px">
    <p class="home_header">
        <a style="color:rgb(162, 162, 226); font-weight:bolder" href="/articles">Home</a>
    </p>
</div>

<div class="container">
    <div>
        <div style="display: flex">
            <h2 class="article_title">{{ $article->title }}</h2>

            @if($article->user != null && auth()->user() != null)
                @if (auth()->user()->is($article->user))

                    <a href="/articles/{{ $article->id }}/edit">
                        <button style="margin-left:100px; martgin-top:5px">Edit Article</button>
                    </a>


                <form method="POST" action="/articles/{{ $article->id }}">

                    @csrf
                    @method('DELETE')

                    <button type="submit" style="margin-left:10px;">Delete Article</button>
                </form>
                @endif
            @endif
        </div>

        <div>
            <h6 class="time_stamp">{{ $article->created_at->diffForHumans() }}</h6>
            <h6 class="article_author"> written by: {{ $article->user->name }}</h6>
        </div>

        <div style="margin-left: 15px; width:870px">
            <span>{{ $article->body }}</span>
        </div>

        <div style="display: flex; margin-left:15px; margin-bottom:25px">

            <form method="POST" action="/articles/{{ $article->id }}/like">
                @csrf
                {{-- onclick="function_like()" --}}
                    <button id="like" type="submit" style="background-color:white; border:0;">
                        <svg viewBox="0 0 20 20" style="width:13px;
                        {{ $article->isLikedBy(auth()->user()) ? 'color:#4299e1' : 'color:#a0aec0' }}">

                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g style="fill: currentColor">
                                    <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                                </g>
                            </g>
                        </svg>
                    </button>
            </form>

            {{ $article->allLikes() }}

            <form method="POST" action="/articles/{{ $article->id }}/like">
                @csrf
                @method("DELETE")
                {{-- onclick="function_dislike()" --}}
                    <button  id="dislike" type="submit" style="background-color:white; border:0;">
                        <svg viewBox="0 0 20 20"  style="width:13px;
                        {{ $article->isDislikedBy(auth()->user()) ? 'color:#4299e1' : 'color:#a0aec0' }}">

                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g style="fill: currentColor">
                                    <path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z" id="Fill-97"></path>
                                </g>
                            </g>
                        </svg>
                    </button>
            </form>

            {{ $article->allDislikes() }}
        </div>
    </div>

    <div>
        <form method="POST" action="/articles/{{ $article->id }}">
            @csrf

            <textarea class="insert_comment" name ="body" placeholder="Comment Here"></textarea>


            <button type="submit">Comment</button>
        </form>

        @error('body')
            <p style="color:rgba(255, 0, 0, 0.801)">{{ $message }}</p>
        @enderror

        @foreach ($comments as $comment)
            @include('_comment')
        @endforeach

        <div style="margin-left:500px; margin-top: 30px">
            {{ $comments->links() }}
        </div>
    </div>
</div>

<script src="{{ asset('js/like.js') }}" type="application/javascript"></script>
@endsection
