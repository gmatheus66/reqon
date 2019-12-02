        <nav class="navbar navbar-expand-md navbar-light shadow-sm navClass">

            <div class="container"> 
                <a class="navbar-brand-welcome navbar-geral" href="{{ url('/') }}"><img id="logoSite" src="{{ asset('img/logoSite.png') }}">ReqOn</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            <div class="form-inline linksNavbar">

                            @if(Auth::guard('funcionario')->check())
                                <!-- <a class="nav-link" id="navbarDropdown" href="{{ url('/indexfunc') }}">{{ __('Requerimentos') }}</a> -->
                            @elseif(Auth::guard()->check())
                                <!-- <a class="nav-link" id="navbarDropdown" href="{{ url('/requerimento') }}">{{ __('Requerimentos') }}</a> -->
                            @else
                                <a href="#">SOBRE</a>
                                <a href="#">CONTATO</a>
                                <a href="{{ route('login') }}">ENTRAR</a>
                            @endif

                            </div>
                        @endif
                        @if (Auth::check())
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nome }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

        </nav>