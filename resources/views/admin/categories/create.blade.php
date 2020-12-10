@extends('admin.layout')
@section('content')
    <div class="card mt-3">
        <h1 class="card-header h3">
            {{ __('messages.CreateCategory') }}
        </h1>
        <form class="card-body" action="{{ route('admin.categories.store') }}" method="POST">
            @include('admin.categories.form')
            <button type="submit" class="btn btn-success">{{ __('messages.Create') }}</button>
        </form>
    </div>
@endsection
