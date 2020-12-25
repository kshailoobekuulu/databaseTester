@extends('frontend.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ $task->getTitle() }}
        </div>
        <div class="card-body">
            <p>
                {{ $task->getDescription() }}
            </p>
            <form action="{{ route('frontend.submit-solution', $task->getId()) }}" method="POST">
                @csrf
                <label for="solution">
                    {{ __('messages.WriteCodeBelow') }}
                </label> <br>
                <textarea name="solution" id="solution" rows="10" class="form-control
                        @error('solution') border-danger @enderror">{{ old('solution') }}</textarea>
                @error('solution')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

                <div class="w-75 ml-auto mt-2">
                    <label for="syntax">{{ __('messages.ChooseSyntax') }}</label>
                    <select name="syntax" id="syntax" class="form-control">
                        <option value="mysql_solution">MySQL</option>
                        <option value="postgre_solution">PostgreSQL</option>
                        <option value="mysql_solution">MsSQL Server</option>
                    </select>
                </div>
                <div class="w-50 text-right ml-auto mt-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('messages.SubmitSolution') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
