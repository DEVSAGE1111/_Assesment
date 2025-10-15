@extends('contributor.layouts.app')

@section('content')
    <div class="page-header">
      <h1>@lang('dashboard.comments')</h1>
    </div>

    @include ('contributor/comments/_list')
@endsection
