@extends('admin.layout')
@section('content')
    <br>
    <div>
        <a class="btn btn-success" href="{{ route('admin.categories.create') }}">
            + {{ __('messages.CreateCategory') }}
        </a>
    </div>
    <table class="table table-light border mt-2">
        <tr>
            <th class="border">{{ __('messages.CategoryName') }}</th>
            <th class="border">{{ __('messages.Slug') }}</th>
            <th class="border">{{ __('messages.Actions') }}</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td class="border">{{ $category->getTitle() }}</td>
                <td class="border">{{ $category->getSlug() }}</td>
                <td class="border">
                    <a href="{{ route('admin.categories.edit', $category->getSlug()) }}" class="btn btn-info">{{ __('messages.Edit') }}</a>
                    <form class="d-inline-block" action="{{ route('admin.categories.destroy', $category->getSlug()) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">{{ __('messages.Delete') }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="m-2">
        {{ $categories->links() }}
    </div>
@endsection
