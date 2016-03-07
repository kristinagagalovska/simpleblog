@extends('app')
@section('title')
    @if($post)
        {{ $post->title }}
        @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
            <button><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
        @endif
    @else
        Page does not exist
    @endif
@endsection
@section('title-meta')
    <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a
                href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
@endsection
@section('content')
    @if($post)
        {!! $post->body !!}
        <h2>Leave a comment</h2>
        @if(Auth::guest())
            <p>Login to Comment</p>
        @else
            <form method="post" action="/comment/add">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="on_post" value="{{ $post->id }}">
                <input type="hidden" name="slug" value="{{ $post->slug }}">

                <textarea required="required" placeholder="Enter comment here" name="body"></textarea>

                <input type="submit" name='post_comment' value="Post"/>
            </form>
        @endif
        @if($comments)
            <ul style="list-style: none; padding: 0">
                @foreach($comments as $comment)
                    <li>
                        <h3>{{ $comment->author->name }}</h3>
                        <p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
                        <p>{{ $comment->body }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    @else
        404 error
    @endif
@endsection