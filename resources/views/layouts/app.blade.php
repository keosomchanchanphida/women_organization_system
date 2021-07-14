<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name', 'Laravel'))
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ config('app.env', 'local') == 'local'? asset('css/app.css'):secure_asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div>
            @yield('banner')
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="nav-link btn btn-secondary mr-2 text-white py-6px" href="{{ url('/') }}">
                    ໜ້າຫຼັກ
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="dropdown mt-1 mt-md-0">
                            <button class="btn btn-secondary dropdown-toggle w-100"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ການເຄື່ອນໄຫວ
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">ການເຄືອນໄຫວພາຍໃນ</a>
                                <a class="dropdown-item" href="#">ການເຄື່ອນໄຫວພາຍນອກ</a>
                            </div>
                        </div>
                        @guest
                        <div class="dropdown ml-2 mt-1 mt-md-0">
                            <button class="btn btn-secondary dropdown-toggle w-100"
                                id="showDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ສະຖິຕິ
                            </button>
                            <div class="dropdown-menu" aria-labelledby="showDropdown">
                                <a class="dropdown-item" href="#">ສະແດງສະມາຊິກ</a>
                                <a class="dropdown-item" href="#">ຄວາມເປັນມາ</a>
                            </div>
                        </div>
                        <a href="#" class="nav-link btn btn-secondary ml-md-2 text-white py-5px mt-1 mt-md-0">ຕິດຕໍ່ສອບຖາມ</a>
                        @else
                        <a href="{{ route('show-members') }}" class="nav-link btn btn-secondary ml-md-2 text-white py-5px mt-1 mt-md-0">
                            ສະແດງສະມາຊິກ
                        </a>
                        @endguest
                        @auth
                            <a class="nav-link btn btn-secondary ml-md-2 text-white py-5px mt-1 mt-md-0" href="/add-member">
                                ເພີ່ມສະມາຊິກ
                            </a>
                            <div class="dropdown mt-1 mt-md-0">
                                <button class="ml-md-2 btn btn-secondary dropdown-toggle w-100"
                                    id="addActivitiesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ເພີ່ມການເຄື່ອນໄຫວ
                                </button>
                                <div class="dropdown-menu" aria-labelledby="addActivitiesDropdown">
                                    <a class="dropdown-item" href="#">ເພີ່ມການເຄືອນໄຫວພາຍໃນ</a>
                                    <a class="dropdown-item" href="#">ເພີ່ມການເຄື່ອນໄຫວພາຍນອກ</a>
                                </div>
                            </div>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('ເຂົ້າສູ່ລະບົບ') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ config('app.env', 'local') == 'local'? asset('js/app.js'):secure_asset('js/app.js') }}" defer></script>
</body>
</html>
