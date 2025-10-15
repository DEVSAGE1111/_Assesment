@extends('contributor.layouts.app')

@section('content')
    <p>
        @lang('posts.show') :
        <a href="{{ route('posts.show', $comment->post) }}">
            {{ route('posts.show', $comment->post) }}
        </a>
    </p>

    @include('contributor/comments/_form')
@endsection
