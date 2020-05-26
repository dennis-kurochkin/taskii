<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Taskii') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.5/examples/dashboard/dashboard.css">

    @yield('head')
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-dark sticky-top navbar-expand-lg justify-content-between bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('/') }}"> {{ config('app.name', 'Веб-студия A7') }}</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3">
                @guest
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if(Route::has('register'))
                        <li class="nav-item text-nowrap">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} {{ Auth::user()->surname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            @auth
                                @if(Auth::user()->isAdmin())
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                            <i class="fas fa-user"></i>
                                            Пользователи
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->isManager())
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('stats') ? 'active' : '' }}" href="{{ route('stats.index') }}">
                                            <i class="fas fa-chart-line"></i>
                                            Статистика
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('projects') ? 'active' : '' }}" href="{{ route('projects.index') }}">
                                            <i class="fas fa-folder"></i>
                                            Проекты
                                        </a>
                                    </li>
                                @endif
                                @if(Auth::user()->isEmployee())
                                    <li class="nav-item">
                                        <a class="nav-link {{ Request::is('tasks') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                                            <i class="fas fa-list"></i>
                                            Мои задачи
                                        </a>
                                    </li>
                                @endif
                            @endauth
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('help') ? 'active' : '' }}" href="{{ route('help.index') }}">
                                    <i class="fas fa-question-circle"></i>
                                    Помощь по системе
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{ $title ?? '' }}</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                @auth
                                    @if(Auth::user()->isManager())
                                        <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-outline-secondary">Добавить задачу</a>
                                        <a href="{{ route('projects.create') }}" class="btn btn-sm btn-outline-secondary">Добавить проект</a>
                                    @endif
                                    @if(Auth::user()->isAdmin())
                                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </main>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

        @yield('head')

</body>

</html>
