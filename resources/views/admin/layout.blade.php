@extends('layouts.app')
@section('headerTitle')
    <a class="h5 text-decoration-none main-text-color" href="{{ route('admin.mainPage') }}">{{ __('messages.Administration') }}</a>
@endsection
@section('additionalNavLinks')
    <li class="nav-item border-bottom border-sm-none">
        <a class="nav-link main-link-color @if(Route::currentRouteName() == 'admin.tasks.index') active-link @endif"
           href="{{ route('admin.tasks.index') }}">{{ __('messages.Tasks') }}</a>
    </li>
    <li class="nav-item border-bottom border-sm-none">
        <a class="nav-link main-link-color @if(Route::currentRouteName() == 'admin.categories.index') active-link @endif"
           href="{{ route('admin.categories.index') }}">{{ __('messages.Categories') }}</a>
    </li>
    @can('update-user-information')
        <li class="nav-item border-bottom border-sm-none">
            <a class="nav-link main-link-color @if(Route::currentRouteName() == 'admin.users.index') active-link @endif"
               href="{{ route('admin.users.index') }}">{{ __('messages.Users') }}</a>
        </li>
    @endcan
@endsection
