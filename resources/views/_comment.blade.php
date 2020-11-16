<div>
    <div style="margin-top:20px; display:flex">
            <div>
                <h5 class="comment_user">{{ $comment->user->name }}:</h5>

            </div>
            <div style="margin-left:10px;">
                <p style="color: black; width:200px">{{ $comment->body }}</p>
            </div>
    </div>

    <div style="display: flex;">
        <h6 style="font-style: italic; margin-right:50px">{{ $comment->created_at->diffForHumans() }}</h6>

        @if (auth()->user() != null && $comment != null)
            @if(auth()->user()->id === $comment->user_id)
                <form method="POST" action="/articles/{{ $article->id }}/comment/{{ $comment->id }}">

                    @csrf
                    @method('DELETE')

                    <button style="margin-left:5px" type="submit">Delete</button>
                </form>
            @endif
        @endif
    </div>
</div>
