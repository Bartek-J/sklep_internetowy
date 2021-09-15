<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset('storage/logos/ikona.png')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
        try {
            window.$ = window.jQuery = require('jquery');
        } catch (e) {}
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('header')
</head>

<body>
    <div id="app" class="" style="min-height: 94vh !important;">
        <div class="container d-flex justify-content-between align-items-end pb-1">

        {{-- <div> <a class="navbar-brand" href="{{ url('/') }}"> <img src="/storage/logos/DobreLogo.png" class="card-img-top" style="height: 40px; width:auto"> </a></div> --}}
        <div class="align-items-center mb-2" style="font-size:80%"></div>    
        <div> <a class="navbar-brand" href="{{ url('/') }}"> <img src="/storage/logos/Header.png" class="card-img-top" style="height: 40px; width:auto"> </a></div>
            <div>
                @guest
                <a href="{{ route('login') }}" class="text-secondary">Zaloguj się</a>
                {{-- | <a href="{{ route('register') }}">Rejestracja</a> --}}
                @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if(Auth()->user()->role == 'admin')
                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                        Panel Admina
                    </a>
                    @endif
                    <a class="dropdown-item" href="{{ route('zamowieniastatus') }}">
                        Zamówienia
                    </a>
                    <a class="dropdown-item" href="{{ route('ustawienia') }}">
                        Ustawienia
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @endguest
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(46, 52, 59)">
            <div class="container">
                <div class="navbar-toggler" style="border:0; color:white;">Menu</div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav w-100 justify-content-between">
                        <div class="navbar-nav"> <a href="{{ url('/') }}" class='nav-link nav-item active'>Strona Główna</a>
                            <a href="{{ url('/products') }}" class='nav-link nav-item'>Produkty</a>
                            <a href="{{ url('/Regulamin') }}" class='nav-link nav-item'>Regulamin</a>
                            <a href="{{ url('/Kontakt') }}" class='nav-link nav-item'>Kontakt</a></div>
                        <div class="d-flex align-items-center">
                            <a href="{{ url('/Koszyk') }}" class='nav-link nav-item'>
                                <svg width="1.2em" height="1.2em" viewBox="0 1 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                                Koszyk
                                @if (Cart::getTotalQuantity() > 0 )
                                <span class="badge badge-pill badge-dark">{{Cart::getContent()->count()}}</span>
                                @endif
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </nav>
        <main class="w-100  mt-4">
            @if (isset(session('status')['type']) )
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-{{ session('status')['type']}}">
                            {{ session('status')['content'] }}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
    <div class="container-fluid mt-5">
        <hr>
        <div class="container">
            <div class="row justify-content-center mb-4" style="font-size: 75%;">
                <div class="col-sm-3 col-6">
                    <div class="container text-center">
                        <svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                        <br>
                        PLAKATY<br>
                        3-7 dni roboczych
                    </div>
                </div>
                <div class="col-sm-3 col-6">
                    <div class="container text-center">
                        <svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-box-seam" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg>
                        <br>
                        DARMOWA DOSTAWA<br>
                        Przy zakupach powyżej 199 zł
                    </div>
                </div>
                <div class="col-sm-3 col-6">
                    <div class="container text-center">
                        <svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                            <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                        </svg>
                        <br>
                        BEZPIECZNE PŁATNOŚCI<br>
                        Szybkie i bezpieczne płatności dzięki serwisowi Dotpay
                    </div>
                </div>
                <div class="col-sm-3 col-6">
                    <div class="container text-center">
                        <svg width="50px" height="50px" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                        <br>
                        SNEAKERS BOX<br>
                        Do 3 tygodni
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4" style="background-color:rgb(46, 52, 59)">
        <div class="container pt-3">

            <div class="row align-items-center justify-content-center text-center">

            <div class="col-sm-4">
                    <ul class="list-unstyled ">
                        <li class="font-weight-bold text-white"> Informacje: </li>
                        <li class=""> <a href="./Regulamin" class="text-muted">Regulamin</a></li>
                        <li class=""> <a href="./Kontakt" class="text-muted">Kontakt</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul class="list-unstyled ">
                        <li class="font-weight-bold text-white"> Nasze produkty: </li>
                        <li class=""> <a href="./products?1=on" class="text-muted">Plakaty</a></li>
                        <li class=""> <a href="./products?6=on" class="text-muted">Sneaker Boxy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul class="list-unstyled">
                        <li class="font-weight-bold text-white"> Sprawdź także: </li>
                        <li class=""> <a href="" class="text-muted" target="_blank"><img src="{{asset('storage/logos/instagram.png')}}" style="height:25px">Instagram</a></li>
                        <li class=""> <a href="" class="text-muted" target="_blank"><img src="{{asset('storage/logos/facebook.png')}}" style="height:25px">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>