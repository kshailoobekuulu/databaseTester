@csrf
<div class="form-group">
    <label for="title">
        {{ __('messages.TaskTitle') }}
    </label>
    <input id="title" name="title" type="text" class="form-control @error('title') border-danger @enderror"
           required value="{{ old('title') ?: (isset($task) ? $task->getTitle() : '') }}">
    @error('title')
    <small class="text-danger"> {{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="description">{{ __('messages.TaskDescription') }}</label>
    <textarea name="description" id="description" class="form-control @error('description') border-danger @enderror" required rows="5">{{ old('description') ?: (isset($task) ? $task->getDescription() : '') }}</textarea>
    @error('description')
    <small class="text-danger"> {{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <p>{{ __('messages.TaskType') }}</p>
    @foreach($types as $type)
        <div class="form-control position-relative">
            <input type="radio" name="type" id="{{ $type }}" value="{{ $type }}" class="position-absolute mt-1"
                   required @if($taskType == $type) checked @endif>
            <label for="{{ $type }}" class="pl-4 d-block">
                {{ $type }}
            </label>
        </div>
    @endforeach
</div>
<p>{{ __('messages.CorrectSolutions') }}:</p>
<div class="form-group">
    <label for="mysql_solution">MySQL</label>
    <textarea name="mysql_solution" id="mysql_solution" class="form-control @error('mysql_solution') border-danger @enderror"
              required rows="5">{{ old('mysql_solution') ?: (isset($task) ? $task->mysql() : '') }}</textarea>
    @error('mysql_solution')
    <small class="text-danger"> {{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="postgre_solution">PosgreSQL</label>
    <textarea name="postgre_solution" id="postgre_solution" class="form-control @error('postgre_solution') border-danger @enderror"
              required rows="5">{{old('postgre_solution') ?: (isset($task) ? $task->postgre() : '') }}</textarea>
    @error('postgre_solution')
    <small class="text-danger"> {{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="mssql_solution">MsSQL</label>
    <textarea name="mssql_solution" id="mssql_solution" class="form-control @error('mssql_solution') border-danger @enderror"
              required rows="5">{{ old('mssql_solution') ?: (isset($task) ? $task->mssql() : '') }}</textarea>
    @error('mssql_solution')
    <small class="text-danger"> {{ $message }}</small>
    @enderror
</div>

    <x-select-category :categoriesOfTask='$categoriesOfTask'/>

<div class="form-group">
    <input type="checkbox" id="status" name="status" {{ old('status') ?: (isset($task) ? ($task->isActive() ? 'checked' : '') : '') }}>
    <label for="status">{{ __('messages.ShowToUsers') }}</label>
    @error('status')
    <small class="text-danger">
        {{ $message }}
    </small>
    @enderror
</div>
