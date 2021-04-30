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
                    <a href="{{ route('frontend.tasks.index')}}"
                       class="main-text-color nav-link pl-3 btn text-left
                           @if(!$currentCategoryId)
                                font-weight-bold
                           @endif ">
                        {{ __("messages.AllTasks") }}
                    </a>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item border-bottom">
                        <a href="{{ route('frontend.tasks.index', ['category' => $category->getSlug()])}}"
                           class="main-text-color nav-link pl-3 btn text-left
                           @if($currentCategoryId && $currentCategoryId == $category->getId())
                                   font-weight-bold
                           @endif ">
                            {{ $category->getTitle() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
