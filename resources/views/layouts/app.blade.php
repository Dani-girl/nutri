 <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <!-- Custom -->
    @stack('head')
</head>
<body data-spy="scroll" data-target=".navbar">
    
    <div id="app">
        <nav class="navbar @if(url()->current() == url('/')) fixed-top @endif navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                @guest
                <a class="nav-link" href="{{ url('join-our-team') }}">{{ __('Join our team') }}</a>
                @endguest
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
                        @guest
                            @if(url()->current() == url('/'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="#home">{{ __('Home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about-us">{{ __('About us') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#meet-our-team">{{ __('Meet our nutritionists') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#blog">{{ __('Blog') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#testimonials">{{ __('Testimonials') }}</a>
                                </li>
                            @endif
                            @if(url()->current() != url('/'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/') }}">{{ __('Home') }}</a>
                            </li>
                            @if(Auth::user()->role<2)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Lists
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ url('nutritionist-requests') }}">
                                      Requests</a>
                                      <a class="dropdown-item" href="{{ url('nutritionists') }}">Nutritionists</a>
                                      <a class="dropdown-item" href="{{ url('clients') }}">Clients</a>
                                      @if(Auth::user()->role==0)
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="{{ url('admins') }}">Admins</a>
                                      @endif
                                    </div>
                                  </li>
                            @elseif(Auth::user()->role==3)
                                <li class="nav-item">
                                    <a class="nav-link" href="">My profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('my-clients') }}">My clients</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('diet-requests') }}">Requests board</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('meals') }}">Meals list</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('my-diet-query') }}">My diet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">My profile</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('body')
        @yield('content')
        <!-- <main class="py-4">
            @yield('content')
        </main> -->
    </div>
</body>
</html>
