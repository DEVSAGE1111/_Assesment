@extends('contributor.layouts.app')

@section('content')
    <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.posts')</h1>
      <a href="{{ route('userposts.create') }}" class="btn btn-primary btn-sm align-self-center">
        <x-icon name="plus-square" prefix="fa-regular" />

        @lang('forms.actions.add')
      </a>
    </div>

    @include ('contributor/posts/_list')
@endsection
