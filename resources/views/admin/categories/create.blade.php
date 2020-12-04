@extends('admin.layout')
@section('content')
    <div class="card mt-3">
        <h1 class="card-header h3">
            {{ __('messages.CreateCategory') }}
        </h1>
        <form class="card-body" action="{{ route('admin.categories.store') }}" method="POST">
            @include('admin.categories.form')
        </form>
    </div>
@endsection
