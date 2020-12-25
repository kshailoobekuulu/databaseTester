@extends('admin.layout')
@section('content')
    <form action="{{ route('admin.tasks.store') }}" method="POST">
        <x-admin-task-form :task='null' :categoriesOfTask='[]'/>
        <button class="btn btn-info" type="submit">{{ __('messages.Create') }}</button>
    </form>
@endsection
