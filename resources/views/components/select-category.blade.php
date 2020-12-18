<div class="form-group">
    <label for="categories">{{ __('messages.Categories') }}</label>
    <button type="button" id="selectTrigger" class="form-control @error('category.*') border-danger @enderror">
        {{ __('messages.ChooseCategory') }}
    </button>
    <div style="display: none" id="dropDownSelect" class="container card p-2">
        @foreach($categories as $category)
            <div class="form-control position-relative">
                <input id="category{{ $category->getId() }}" name="category[]" value = "{{ $category->getId() }}"
                       class="position-absolute mt-1 categoryItem" type="checkbox" @if($category->selected) checked @endif>
                <label for="category{{ $category->getId() }}" class="pl-4 d-block">{{ $category->getTitle() }}</label>
            </div>
        @endforeach
    </div>
    @error('category.*')
        <small class="text-danger">
            {{ $message }}
        </small>
    @enderror
</div>
