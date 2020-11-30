@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-3 mb-2 mb-md-0 p-2">
            <x-categories></x-categories>
        </div>
        <div class="col-12 col-md-8 col-lg-9 p-2">
            <div class="card shadow-sm">
                <div class="card-header font-weight-bold">{{ __('messages.Tasks') }}</div>
                <div>
                    <div class="card-body pt-0 pb-0 border-bottom">
                        <a href="#" class="text-decoration-none text-dark">
                            <p class="m-2 p-1 main-text-color">Эң мыкты студентти тандоо</p>
                        </a>
                        <div class="mt-n2 pt-0 ml-2 pl-1 mb-2 attribute">
                            <span class="mr-1">{{ __('messages.NotSolved') }}</span>
                            | <span class="ml-1 mr-1">Group By</span>
                            | <span class="ml-1">{{ __('messages.Solutions') }}: 183</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
