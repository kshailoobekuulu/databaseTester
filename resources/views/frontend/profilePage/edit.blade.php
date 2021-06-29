@extends('frontend.layout')
@section('content')
<div class="card p-3">
    <h1>{{ __('messages.EditProfile') }}</h1>
    <form action="{{ route('frontend.update-profile-data') }}" method="POST">
        @include('core.userUpdateFields', ['cancelRoute' => route('frontend.profile-page'), 'admin' => false])
    </form>
</div>
@endsection
