@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset($user->getPhoto() ?: \App\Models\User::DEFAULT_PHOTO_PATH) }}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ $user->getName() }}</h4>
                                    <p class="text-secondary mb-1">{{ $user->role->getTranslation() }}</p>
                                    <p class="text-muted font-size-sm">{{ __('messages.ProblemsSolved') }}: {{ $user->solved_tasks_count }}</p>
                                    <a href="{{ route('admin.users.edit', $user->getId()) }}" class="btn btn-info">{{ __('messages.Edit') }}</a>
                                    <button class="btn btn-outline-danger" class="btn btn-danger delete-button" data-toggle="modal"
                                            data-target="#deleteModal" data-route="{{ route('admin.users.destroy', $user->getId()) }}">
                                        {{ __('messages.Delete') }}
                                    </button>
                                    @include('admin.deleteModal', ['deleteTitle' => __('messages.AreYouSureToDeleteThisUser')])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('messages.FullName') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->getFullName() }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('messages.E-MailAddress') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->getEmail() }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('messages.PhoneNumber') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->getMainPhoneNumber() }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('messages.AdditionalPhoneNumber') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->getAdditionalPhoneNumber() }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('messages.Address') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->getAddress() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3">Статистика</h6>
                                    <small>Бардык маселелер</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Чыгарылган маселелердин саны</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Чыгарылбаган маселелердин саны</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 30%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
