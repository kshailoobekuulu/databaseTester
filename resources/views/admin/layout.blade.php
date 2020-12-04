@extends('layouts.app')
@section('headerTitle')
    <h3>{{ __('messages.Administration') }}</h3>
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
@endsection
