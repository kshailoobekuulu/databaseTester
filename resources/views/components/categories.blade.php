<nav class="navbar-expand-md card p-0 shadow-sm">
    <div class="container p-0 m-0">
        <button class="navbar-toggler ml-0 border-0 p-2 w-100 border-primary card-header" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-list-ul main-text-color"> {{__('messages.Categories')}}</span>
            <span class="ml-auto"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="list-unstyled w-100 mb-0">
                <div class="card-header d-none d-md-block font-weight-bolder">
                     {{ __('messages.Categories') }}
                </div>
                    <li class="nav-item border-bottom">
                        <a href="{{ route('home')}}"
                           class="main-text-color nav-link pl-3 btn text-left">
{{--                       @if($selectedCategory && $selectedCategory->id == $categoryItem['id'])--}}
{{--                               font-weight-bold--}}
{{--                       @endif ">--}}
                            Категория 1
                        </a>
                    </li>
                <li class="nav-item border-bottom">
                    <a href="{{ route('home')}}"
                       class="nav-link pl-3 btn text-left main-text-color">
                        Категория 2
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
