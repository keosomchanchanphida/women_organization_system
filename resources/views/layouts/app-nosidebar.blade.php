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
        <div class="overflow-hidden">
            @yield('banner')
        </div>
        <nav class="navbar sticky-top navbar-expand-md navbar-light bg-white shadow-sm">
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
                        <div class="dropdown mt-1 mt-md-0 d-none d-md-block">
                            <button class="btn btn-secondary dropdown-toggle w-100"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ການເຄື່ອນໄຫວ
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('inside-activities') }}">ການເຄືອນໄຫວພາຍໃນ</a>
                                <a class="dropdown-item" href="{{ route('outside-activities') }}">ການເຄື່ອນໄຫວພາຍນອກ</a>
                            </div>
                        </div>
                        <div class="dropdown ml-md-2 mt-1 mt-md-0 d-none d-md-block">
                            <button class="btn btn-secondary dropdown-toggle w-100"
                                id="showDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ສະຖິຕິ
                            </button>
                            <div class="dropdown-menu" aria-labelledby="showDropdown">
                                <a class="dropdown-item" href="{{ route('show-members') }}">ສະແດງສະມາຊິກ</a>
                                <a class="dropdown-item" href="{{ route('all-files') }}">ຮ່າງຂໍ້ມູນດີເດັ່ນ3ດີ</a>
                                <a class="dropdown-item" href="{{ route('positions') }}">ໂຄງຮ່າງການຈັດຕັ້ງ</a>
                            </div>
                        </div>
                        <div class="dropdown ml-md-2 mt-1 mt-md-0 d-none d-md-block">
                            <button class="btn btn-secondary dropdown-toggle w-100"
                                id="showDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ກ່ຽວກັບພວກເຮົາ
                            </button>
                            <div class="dropdown-menu" aria-labelledby="showDropdown">
                                <a class="dropdown-item" href="{{ route('history') }}">ຄວາມເປັນມາ</a>
                                <a class="dropdown-item" href="{{ route('contacts') }}">ຕິດຕໍ່ສອບຖາມ</a>
                            </div>
                        </div>
                        <a class="nav-link btn btn-secondary ml-md-2 mt-1 mt-md-0 text-white py-6px d-md-none" href="{{ route('inside-activities') }}">ການເຄືອນໄຫວພາຍໃນ</a>
                        <a class="nav-link btn btn-secondary ml-md-2 mt-1 mt-md-0 text-white py-6px d-md-none" href="{{ route('outside-activities') }}">ການເຄື່ອນໄຫວພາຍນອກ</a>
                        <a class="nav-link btn btn-secondary ml-md-2 mt-1 mt-md-0 text-white py-6px d-md-none" href="{{ route('show-members') }}">ສະແດງສະມາຊິກ</a>
                        <a class="nav-link btn btn-secondary ml-md-2 mt-1 mt-md-0 text-white py-6px d-md-none" href="{{ route('all-files') }}">ຮ່າງຂໍ້ມູນດີເດັ່ນ3ດີ</a>
                        <a class="nav-link btn btn-secondary ml-md-2 mt-1 mt-md-0 text-white py-6px d-md-none" href="{{ route('positions') }}">ໂຄງຮ່າງການຈັດຕັ້ງ</a>
                        <a class="nav-link btn btn-secondary ml-md-2 mt-1 mt-md-0 text-white py-6px d-md-none" href="{{ route('history') }}">ຄວາມເປັນມາ</a>
                        <a class="nav-link btn btn-secondary ml-md-2 mt-1 mt-md-0 text-white py-6px d-md-none" href="{{ route('contacts') }}">ຕິດຕໍ່ສອບຖາມ</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto pt-1 pt-md-0 pl-md-2">
                        <!-- Authentication Links -->
                        <form action="{{ route('search-activities') }}" method="GET" class="d-flex">
                            <input type="text" name="search" placeholder="ຄົ້ນຫາກິດຈະກໍາ" class="form-control">
                            <button type="submit" class="btn btn-secondary ml-1 py-5px">ຄົ້ນຫາ</button>
                        </form>
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
        @if (session()->has('alert-message'))
            <div class="alert position-absolute w-100 text-center {{ session()->get('alert-class') ?? 'alert-danger' }}" style="z-index: 1;">
                {{ session()->get('alert-message') }}
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="bg-success px-3 pt-3 pb-5 mt-6 mb-n3">
            <h3 class="text-center">ຊ່ອງທາງການຕິດຕໍ່ທີມພັດທະນາ</h3>
            <ul class="offset-sm-2 offset-md-4">
                <li>ຕິດຕໍ່</li>
                <li>ຮ່ວມງານ</li>
                <li>ແຈ້ງບັນຫາ</li>
            </ul>
            <div class="offset-sm-2 offset-md-4">
                <div class="mb-2">
                    <a class="text-dark" href="https://web.facebook.com/keosomchan.chanphida.3"><img src="/storage/img/facebook.svg" alt="facebook" style="width: 32px;"> Facebook: Keosomchan Chanphida</a>
                </div>
                <div class="mb-2">
                    <a class="text-dark" href="https://wa.me/qr/27PHSPFGZOY7G1"><img src="/storage/img/whatsapp.svg" alt="whatsapp" style="width: 32px;"> Whatsapp: 020 98 980 315</a>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="{{ config('app.env', 'local') == 'local'? asset('js/app.js'):secure_asset('js/app.js') }}" defer></script>
</body>
</html>
