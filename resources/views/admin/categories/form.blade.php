@csrf
<div class="form-group">
    <label for="title">{{ __('messages.CategoryName') }}</label> <br>
    <input class="form-control @error('title') border-danger @enderror" type="text" id="title" name="title" required
           value="{{ old('title') ?: (isset($category) ? $category->getTitle() : '') }}">
    @error('title')
        <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="slug">{{ __('messages.Slug') }}</label> <br>
    <input class="form-control @error('slug') border-danger @enderror" type="text" id="slug" name="slug" required
           value="{{ old('slug') ?: (isset($category) ? $category->getTitle() : '') }}">
    @error('slug')
        <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<button type="submit" class="btn btn-info">{{ __('messages.Edit') }}</button>
