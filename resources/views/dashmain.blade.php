<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel Admina</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark justify-content-between">
        <div class="navbar-brand"><a href="#" data-toggle="collapse" data-target="#layoutSidenav_nav" aria-expanded="false" class="text-light">Panel Administracyjny</a></div>

        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('shippings')}}">Dostawy</a>
                   {{-- <a class="dropdown-item" href="{{ route('MainSite')}}">Strona Główna</a> --}}
                    <a class="dropdown-item" href="{{route('users')}}">Uprawnione konta</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('main')}}">Wyjdz</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav" class="collapse">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Navigacja</div>
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Główna
                        </a>
                        <a class="nav-link" href="{{route('orders')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Zamówienia

                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Produkty
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a href="{{route('productEdit')}}" class="nav-link">
                                    Wszystkie
                                </a>
                                <a class="nav-link" href="{{route('productNew')}}">
                                    Dodaj nowy
                                </a>
                                <a class="nav-link" href="{{route('productDeleted')}}">
                                    Usunięte
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Kategorie
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="{{route('categoryEdit')}}"  aria-expanded="false">
                                    Wszystkie
                                </a>
                                <a class="nav-link collapsed" href="{{route('categoryNew')}}"  aria-expanded="false">
                                    Dodaj nową
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link" href="{{route('rabaty')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Rabaty

                        </a>

                        <a class="nav-link" href="{{route('newsLetter')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Newsletter
                        </a>




                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Zalogowany jako:</div>
                    {{ Auth()->user()->name }}
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                
                @if (session('status'))
                
                
                    <div class="row mt-5 pl-4">
                        <div class="col-10">
                            <div class="alert alert-{{ session('status')['type']}}">
                                {{ session('status')['content'] }}
                            </div>
                        </div>
                    </div>
                
                @endif

                @yield('content')
            </main>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>