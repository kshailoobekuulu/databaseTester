@extends('admin.layout')
@section('content')
<div class="m-2">
    <a href="{{ route('admin.tasks.create') }}" class="btn btn-success">
        + {{ __('messages.CreateTask') }}
    </a>
</div>
<div class="card shadow-sm m-2">
    <div class="card-header font-weight-bold">{{ __('messages.Tasks') }}</div>
    <div>
        <div class="card-body pt-0 pb-0 border-bottom">
            @foreach($tasks as $task)
                <div class="p-2 border-bottom">
                    <div>
                        <a href="{{ route('admin.tasks.show', $task->getId()) }}">
                            {{ $task->getTitle() }}
                        </a>
                    </div>
                    <div>
                        {{ __('messages.Status') }}:
                        @if($task->isActive())
                            {{ __('messages.Active') }}
                        @else
                            {{ __('messages.Inactive') }}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="m-2">
    {{ $tasks->links() }}
</div>
@endsection
