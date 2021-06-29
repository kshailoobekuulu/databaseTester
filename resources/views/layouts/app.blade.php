<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DatabaseTester') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('frontend.home') }}">
                    <img src="{{ asset('img/Manas_logo.png') }}" alt="" style="width: 50px; height: 50px">
                </a>
                @yield('headerTitle')
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @yield('additionalNavLinks')
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item border-bottom border-sm-none">
                                    <a class="main-link-color nav-link @if(Route::is('login')) active-link @endif"
                                       href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="main-link-color nav-link @if(Route::is('register')) == 'register') active-link @endif"
                                       href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown border-bottom border-sm-none">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle main-link-color" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right arise text-center" aria-labelledby="navbarDropdown">
                                    @can('administrate')
                                        <a href="{{ route('admin.mainPage') }}" class="dropdown-item main-link-color border-bottom">
                                            {{ __('messages.Administration') }}
                                        </a>
                                    @endcan
                                    <a href="{{ route('frontend.profile-page') }}" class="dropdown-item main-link-color border-bottom">
                                        {{ __('messages.ProfilePage') }}
                                    </a>
                                    <a class="dropdown-item main-link-color" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-3 min-vh-80">
            @include('messages.success')
            @include('messages.error')
            @yield('content')
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small bg-dark pt-4 mt-4">

        <!-- Footer Text -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase font-weight-bold">Даректер</h5>
                    <p>
                        Башкы кампус :<br> Бишкек, Джал кичи району Тыналиев көчөсү 38/1<br>
                        Кошумча имарат:<br> Бишкек, Чыңгыз Айтматов проспекти 56
                    </p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-6 mb-md-0 mb-3">

                    <!-- Content -->
                    <h5 class="text-uppercase font-weight-bold">Байланыштар</h5>
                    <p>
                        Телефондор:<br>
                        +996 (312) 54‒19‒42<br>
                        +996 (312) 49‒27‒63<br>
                        +996 (312) 49‒27‒86<br>

                        Веб сайт: www.manas.edu.kg
                    </p>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Text -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/">Kubanychbek Shailoobek uulu</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</body>
</html>
