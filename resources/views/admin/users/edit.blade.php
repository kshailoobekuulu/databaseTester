@extends('admin.layout')
@section('content')
    <div class="card p-3">
        <h1>{{ __('messages.EditUserProfile') }}</h1>
        <form action="{{ route('admin.users.update', $user->getId()) }}" method="POST">
            @method('PUT')
            @include('core.userUpdateFields', ['cancelRoute' => route('admin.users.show', $user->getId()), 'admin' => true])
        </form>
    </div>
@endsection
