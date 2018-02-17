<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (isset($title))
            {{$title}}
        @else
            СЭДЗ
        @endif
    </title>

    <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style_new.css') }}" rel="stylesheet" type="text/css">
    <script src="{{asset('public/js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('') }}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" style="padding: 0px;">
                    <img src="{{ asset('public/img/logo.jpg') }}" width="123" height="50" alt="logo">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    {{--<li><a href="#">Link1</a></li>--}}
                    {{--<li><a href="#">Link2</a></li>--}}
                    {{--<li><a href="#">Link3</a></li>--}}
                    {{--<li><a href="#">Link4</a></li>--}}
                    {{--<li><a href="#">Link5</a></li>--}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Войти</a></li>
                        {{--<li><a href="{{ route('register') }}">Зарегистрироваться</a></li>--}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true">
                                    @if (Auth::user()->role == 't')
                                        Учитель
                                        {{ Auth::user()->teacher->lastname }}
                                        {{ Auth::user()->teacher->firstname }}
                                    @else
                                        Учащийся
                                        {{ Auth::user()->schoolkid->lastname }}
                                        {{ Auth::user()->schoolkid->firstname }}
                                    @endif
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выход
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <div class="wrap_result"></div>
</div>

<!-- Scripts -->
<script src="{{ asset('public/js/app.js') }}"></script>
</body>
</html>
