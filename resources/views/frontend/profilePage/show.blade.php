@extends('frontend.layout')
@section('content')
    <div class="container">
        <div class="upload-photo-modal">
            <div class="upload-photo-container position-relative">
                <div class="row">
                    <div class="col-10 col-md-8 col-lg-6 text-center bg-white m-auto position-relative">
                        <i class="position-absolute fa fa-times close-modal text-dark"></i>
                        <div class="rounded-circle overflow-hidden d-inline-block preview-container">
                            <img id="preview-profile-photo" src="{{ $user->photo ?: asset(\App\Models\User::DEFAULT_PHOTO_PATH) }}" class="image-preview" alt="">
                        </div>
                        <form action="{{ route('frontend.upload-profile-photo') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                            @csrf
                            <input id="profile-photo-input" type="file" name="profile_photo" accept="image/png, image/gif, image/jpeg, image/jpg">
                            <br>
                            <button type="submit" class="btn btn-success w-50 mt-5">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="rounded-circle m-auto overflow-hidden profile-photo-container">
                                    <div class="change-image"><i class="fa fa-pencil-square text-white position-absolute"></i></div>
                                    <img src="{{ $user->photo ?: asset(\App\Models\User::DEFAULT_PHOTO_PATH) }}" alt="Admin" width="150">
                                </div>
                                <div class="mt-3">
                                    <h4>{{ $user->getFullName() }}</h4>
                                    <p class="text-secondary mb-0">{{ __('messages.YearInUniversity') }}: {{ $user->getYear() }}</p>
                                    <p class="text-muted font-size-sm">{{ __('messages.ProblemsSolved') }}: {{ $user->solved_tasks_count }}</p>
                                    <a href="{{ route('frontend.edit-profile-page') }}" class="btn btn-info">{{ __('messages.EditProfile') }}</a>
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
                                    {{ $user->getMainPhoneNumber() ?: '-' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('messages.AdditionalPhoneNumber') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->getAdditionalPhoneNumber() ?: '-' }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{ __('messages.Address') }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $user->getAddress() ?: '-' }}
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
