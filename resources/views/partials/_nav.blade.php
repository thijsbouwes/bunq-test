<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 99 24" width="125px">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #18834d;
                            font-size: 20px;
                            font-family: Montserrat-SemiBold, Montserrat;
                            font-weight: 600;
                        }

                        .cls-2 {
                            fill: #6fbe53;
                        }

                        .cls-3 {
                            fill: #1cb8ad;
                        }

                        .cls-4 {
                            fill: #0074b8;
                        }

                        .cls-5 {
                            fill: #9e3034;
                        }

                        .cls-6 {
                            fill: #f72a2a;
                        }

                        .cls-7 {
                            fill: #ff8733;
                        }

                        .cls-8 {
                            fill: #ffca4a;
                        }
                    </style>
                </defs>
                <text id="bunqpoly" class="cls-1" transform="translate(0 19)"><tspan x="0" y="0">b</tspan><tspan class="cls-2" y="0">u</tspan><tspan class="cls-3" y="0">n</tspan><tspan class="cls-4" y="0">q</tspan><tspan class="cls-5" y="0">p</tspan><tspan class="cls-6" y="0">o</tspan><tspan class="cls-7" y="0">l</tspan><tspan class="cls-8" y="0">y</tspan></text>
            </svg>
        </a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
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