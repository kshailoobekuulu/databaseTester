@extends('frontend.layout')

@section('content')
<div class="row">
    <div class="col-12 col-md-4 col-lg-3 mb-2 mb-md-0 p-2">
        <x-categories :currentCategoryId='$currentCategoryId'></x-categories>
    </div>
    <div class="col-12 col-md-8 col-lg-9 p-2">
        <div class="card shadow-sm">
            <div class="card-header font-weight-bold">{{ __('messages.Tasks') }}</div>
            <div>
                @forelse($tasks as $task)
                    <div class="card-body pt-0 pb-0 border-bottom">
                        <a href="{{ route('frontend.tasks.show', $task->getId()) }}" class="text-decoration-none text-dark">
                            <p class="m-2 p-1 main-text-color">{{ $task->getTitle() }}</p>
                        </a>
                        <div class="mt-n2 pt-0 ml-2 pl-1 mb-2 attribute">
                            <span class="mr-1">
                                @if($task->solvedBy->first())
                                    {{ __('messages.Solved') }}
                                @else
                                    {{ __('messages.NotSolved') }}
                                @endif
                            </span>
                            | <span class="ml-1">{{ __('messages.Solutions') }}: {{ $task->solved_by_count }}</span>
                        </div>
                    </div>
                @empty
                    <div class="card-body pt-0 pb-0 border-bottom">
                        <p class="m-2 p-1 main-text-color">{{ __('messages.NoTasksFound') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="mt-2">
            {{ $tasks->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
