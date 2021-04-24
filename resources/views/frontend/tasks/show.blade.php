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

            @if(isset($solutions))
                @if($solutions->last_solution)
                    <button id="lastSolutionButton" class="btn btn-success mb-2">{{__('messages.ShowLastSolution')}}</button>
                @endif
                @if($solutions->correct_solution)
                    <button id="correctSolutionButton" class="btn btn-success mb-2">{{__('messages.ShowMyCorrectSolution')}}</button>
                @endif
                    <div id="lastSolution" style="display: none">
                        <h6>{{__('messages.ShowLastSolution')}}</h6>
                        <pre class="p-2 border rounded">{{ $solutions->last_solution }}
                        </pre>
                    </div>
                    <div id="correctSolution" style="display: none">
                        <h6>{{ __('messages.ShowMyCorrectSolution') }}</h6>
                        <pre class="p-2 border rounded">{{ $solutions->correct_solution }}
                        </pre>
                    </div>
            @endif
        </div>
    </div>
@endsection
