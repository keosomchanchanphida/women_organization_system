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
    <div id="app" class="">
        <nav id="sidebar" class="col-md-2 bg-dark vh-100 d-flex" onmouseenter="openSidebar();" onmouseleave="closeSidebar();">
            <div id="sidebar-placeholder" class="position-absolute">
                <img src="/storage/img/home.svg" class="my-2"/><br>
                <img src="/storage/img/activity.svg" class="my-2"/><br>
                <img src="/storage/img/diary.svg" class="my-2"/><br>
                <img src="/storage/img/two-users.svg" class="my-2"/><br>
                <img src="/storage/img/add-user.svg" class="my-2"/><br>
                <img src="/storage/img/logout.svg" class="my-2"/><br>
            </div>
            <div class="" style="width: 300px;" id="navbarSupportedContent">
                @auth
                    <p id="" class="p-3 text-white">
                        {{ Auth::user()->name }}
                    </p><hr>
                @endauth
                <a class="nav-link text-white py-5px py-3" href="{{ url('/') }}">
                    ໜ້າຫຼັກ
                </a>
                <a class="nav-link text-white py-5px py-3" href="{{ route('inside-activities') }}">
                    ການເຄືອນໄຫວພາຍໃນ
                </a>
                <a class="nav-link text-white py-5px py-3" href="{{ route('outside-activities') }}">
                    <img />ການເຄື່ອນໄຫວພາຍນອກ
                </a>
                <a class="nav-link text-white py-5px py-3" href="{{ route('show-members') }}">
                    ສະແດງສະມາຊິກ
                </a>
                <a class="nav-link text-white py-5px py-3" href="/add-member">
                    ເພີ່ມສະມາຊິກ
                </a>
                <a class="nav-link text-white py-5px py-3" href="{{ route('add-inside-activity') }}">
                    ເພີ່ມການເຄືອນໄຫວພາຍໃນ
                </a>
                <a class="nav-link text-white py-5px py-3" href="{{ route('add-outside-activity') }}">
                    ເພີ່ມການເຄື່ອນໄຫວພາຍນອກ
                </a>
                @auth
                    <a class="nav-link text-white py-5px py-3" href="{{ route('logout') }}"
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
            <div class="overflow-hidden">
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
