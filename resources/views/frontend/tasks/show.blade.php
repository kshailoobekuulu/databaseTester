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
                <textarea name="solution" id="solution" rows="10" required class="form-control
                        @error('solution') border-danger @enderror">{{ old('solution') }}</textarea>
                @error('solution')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

                <div class="w-75 ml-auto mt-2">
                    <label for="syntax">{{ __('messages.ChooseSyntax') }}</label>
                    <select name="syntax" id="syntax" class="form-control @error('syntax') border-danger @enderror">
                        @foreach($availableSyntax as $syntax)
                            <option value="{{ $syntax }}">{{ __('messages.' . $syntax) }}</option>
                        @endforeach
                    </select>
                    @error('syntax')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="w-50 text-right ml-auto mt-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('messages.SubmitSolution') }}
                    </button>
                </div>
            </form>

            @if(isset($solutions))
                <div class="row p-2">
                    @if($solutions->last_solution)
                        <button id="lastSolutionButton" class="btn btn-success m-1 col-12 col-md-3">{{__('messages.ShowLastSolution')}}</button>
                    @endif
                    @if($solutions->correct_solution)
                        <button id="correctSolutionButton" class="btn btn-success m-1 col-12 col-md-3">{{__('messages.ShowMyCorrectSolution')}}</button>
                    @endif
                    <div id="lastSolution" class="col-12 mt-1" style="display: none">
                        <h6>{{__('messages.ShowLastSolution')}}</h6>
                        <pre class="p-2 border rounded">{{ $solutions->last_solution }}
                        </pre>
                    </div>
                    <div id="correctSolution" class="col-12 mt-1" style="display: none">
                        <h6>{{ __('messages.ShowMyCorrectSolution') }}</h6>
                        <pre class="p-2 border rounded">{{ $solutions->correct_solution }}
                        </pre>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
