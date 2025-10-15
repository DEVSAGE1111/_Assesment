@extends('contributor.layouts.app')

@section('content')



    @include('contributor/posts/_thumbnail')

    <form action="{{ route('userposts.update', $post->id) }}" method="POST">
        @method('PUT')
        @csrf

        @include('contributor/posts/_form')

        <div class="pull-left">
            <a href="{{ route('userposts.index') }}" class="btn btn-light">
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
