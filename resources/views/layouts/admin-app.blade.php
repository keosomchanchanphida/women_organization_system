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
    <div id="app" class="d-flex w-100">
        <nav id="sidebar" class="col-md-2 bg-dark vh-100" onmouseenter="openSidebar();" onmouseleave="closeSidebar();">
            <div class="" id="navbarSupportedContent">
                @auth
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                @endauth
                <a class="nav-link text-white py-5px mt-1 mt-md-0" href="{{ url('/') }}">
                    ໜ້າຫຼັກ
                </a>
                <a class="nav-link text-white py-5px mt-1 mt-md-0" href="{{ route('inside-activities') }}">
                    ການເຄືອນໄຫວພາຍໃນ
                </a>
                <a class="nav-link text-white py-5px mt-1 mt-md-0" href="{{ route('outside-activities') }}">
                    ການເຄື່ອນໄຫວພາຍນອກ
                </a>
                <a class="nav-link text-white py-5px mt-1 mt-md-0" href="{{ route('show-members') }}">
                    ສະແດງສະມາຊິກ
                </a>
                <a class="nav-link text-white py-5px mt-1 mt-md-0" href="/add-member">
                    ເພີ່ມສະມາຊິກ
                </a>
                <a class="nav-link text-white py-5px mt-1 mt-md-0" href="{{ route('add-inside-activity') }}">
                    ເພີ່ມການເຄືອນໄຫວພາຍໃນ
                </a>
                <a class="nav-link text-white py-5px mt-1 mt-md-0" href="{{ route('add-outside-activity') }}">
                    ເພີ່ມການເຄື່ອນໄຫວພາຍນອກ
                </a>
                @auth
                    <a class="nav-link text-white py-5px mt-1 mt-md-0" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
            </div>
        </nav>
        <div class="w-100">
            @if (session()->has('alert-message'))
                <div class="alert position-absolute w-100 text-center {{ session()->get('alert-class') ?? 'alert-danger' }}" style="z-index: 1;">
                    {{ session()->get('alert-message') }}
                </div>
            @endif
            <div>
                @yield('banner')
            </div>
            <main id="main" class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ config('app.env', 'local') == 'local'? asset('js/app.js'):secure_asset('js/app.js') }}" defer></script>
</body>
</html>
