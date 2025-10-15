@extends('contributor.layouts.app')

@section('content')
    <p>
        @lang('posts.show') :

        <a href="{{ route('userposts.show', $post) }}">
            {{ route('posts.show', $post) }}
        </a>
    </p>

    @include('contributor/posts/_thumbnail')

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @method('PUT')
        @csrf

        @include('contributor/posts/_form')

        <div class="pull-left">
            <a href="{{ route('posts.index') }}" class="btn btn-light">
                <x-icon name="chevron-left" />

                @lang('forms.actions.back')
            </a>

            <button type="submit" class="btn btn-primary">
                <x-icon name="save" />

                @lang('forms.actions.update')
            </button>
        </div>
    </form>
@endsection
