@extends('layouts.app')
@section('additionalNavLinks')
    <li class="nav-item border-bottom border-sm-none">
        <a class="nav-link main-link-color"
           href="{{ route('frontend.tasks.index') }}">{{ __('messages.Tasks') }}</a>
    </li>
@endsection
