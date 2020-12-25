@extends('admin.layout')
@section('content')
    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
        @method('PUT')
        <x-admin-task-form :task='$task' :categoriesOfTask='$categories'/>
        <button class="btn btn-info" type="submit">{{ __('messages.Edit') }}</button>
    </form>
@endsection
