@extends('admin.layout')
@section('content')
    <div class="p-3 shadow-sm bg-white">
        <h1 class="h3">{{ $task->getTitle() }}</h1>
        <br>
        <h5 class="font-weight-bold">{{ __('messages.TaskDescription') }}</h5>
        <p>{{ $task->getDescription() }}</p>
        <h5 class="font-weight-bold">{{ __('messages.Status') }}</h5>
        <p>{{ $task->isActive() ? __('messages.Active') : __('messages.Inactive') }}</p>
        <h5 class="font-weight-bold">{{ __('messages.TaskType') }}</h5>
        <p>{{ $task->getType() }}</p>
        <h5 class="font-weight-bold">{{ __('messages.CorrectSolutions') }}</h5>
        <ul>
            <li>
                {{ __('messages.mysql') }}
                <ul>
                    <li>{{ $task->mysql() }}</li>
                </ul>
            </li>
            <li>
                {{ __('messages.postgre') }}
                <ul>
                    <li>{{ $task->postgre() }}</li>
                </ul>
            </li>
            <li>
                {{ __('messages.mssql') }}
                <ul>
                    <li>{{ $task->mssql() }}</li>
                </ul>
            </li>
        </ul>
        <h5 class="font-weight-bold">{{ __('messages.Categories') }}</h5>
        @forelse($categories as $category)
            <ul>
                <li>{{ $category->getTitle() }}</li>
            </ul>
        @empty
            {{ __('messages.CategoriesNotFound') }}
        @endforelse
        <div class="text-right">
            <a href="{{ route('admin.tasks.edit', $task->getId()) }}" class="btn btn-info">
                {{ __('messages.Edit') }}
            </a>
            <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#deleteModal"
                    data-route="{{ route('admin.tasks.destroy', $task->getId()) }}">
                {{ __('messages.Delete') }}
            </button>
            @include('admin.deleteModal', ['deleteTitle' => __('messages.AreYouSureToDeleteThisTask')])
        </div>
    </div>
@endsection
