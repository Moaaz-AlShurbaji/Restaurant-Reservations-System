<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div id="app">
        
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none" @disabled(true)>
                            <span class="fs-5 d-none d-sm-inline">Main Page</span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li>
                                <a href="{{ url('/admin/categories') }}" class="nav-link px-0 align-middle">
                                    <span class="ms-1 d-none d-sm-inline">Categories</span> </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/menus') }}" class="nav-link px-0 align-middle">
                                    <span class="ms-1 d-none d-sm-inline">Menus</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/tables') }}" class="nav-link px-0 align-middle ">
                                    <span class="ms-1 d-none d-sm-inline">Tables</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/reservations') }}" class="nav-link px-0 align-middle">
                                    <span class="ms-1 d-none d-sm-inline">Reservations</span> 
                                </a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="d-none d-sm-inline mx-1">{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                             {{ __('Logout') }}
                                         </a>
        
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                             @csrf
                                         </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        
                    </div>
                </div>

                <div class="col py-3">
                    @yield('content')
                </div>
            </div>
        </div>

        <!--<main class="py-4">
            
        </main>-->
    </div>
</body>
</html>
