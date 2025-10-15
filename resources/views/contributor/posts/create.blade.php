@extends('contributor.layouts.app')

@section('content')
    <h1>@lang('posts.create')</h1>

    <form action="{{ route('userposts.store') }}" method="POST">
        @csrf
        @include('contributor/posts/_form')

        <a href="{{ route('userposts.index') }}" class="btn btn-light">
            <x-icon name="chevron-left" />

            @lang('forms.actions.back')
        </a>

        <button type="submit" class="btn btn-primary">
            <x-icon name="save" />

            @lang('forms.actions.save')
        </button>
    </form>
@endsection
