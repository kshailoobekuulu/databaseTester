@extends('admin.layout')
@section('content')
<div class="card shadow-sm m-2">
    <div class="card-header font-weight-bold">{{ __('messages.Users') }}</div>
    <div>
        <div class="card-body pt-0 pb-0 border-bottom">
            @foreach($users as $user)
                <div class="p-2 border-bottom row">
                    <div class="col-2 col-md-1 text-center d-flex align-items-center justify-content-center">
                        <img src="https://lp-cms-production.imgix.net/2019-06/af0984b430e409281175ecd81eabee4c-victory-square.jpg" class="profile-photo text-center"alt="">
                    </div>
                    <div class="col-10 col-md-11 ml-xl-n4 ml-lg-n2 pl-md-4">
                        <div>
                            <a href="{{ route('admin.users.show', $user->getId()) }}">
                                {{ $user->getFullName() }}
                            </a>
                        </div>
                        <div>
                            {{ __('messages.Roles') }}:
                            @forelse($user->roles as $role)
                                <span class="text-muted">{{ __('messages.' . $role->getTypeUpperCaseFirst()) }}</span>
                            @empty
                                <span class="text-muted">{{ __('messages.User') }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="m-2">
    {{ $users->links() }}
</div>
@endsection
