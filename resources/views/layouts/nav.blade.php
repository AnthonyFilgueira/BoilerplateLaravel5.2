<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">{{ trans('validation.template.home')}}</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ trans('validation.language') }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('lang', ['en']) }}">{{ trans('validation.languages.en') }}</a></li>
                            <li><a href="{{ url('lang', ['es']) }}">{{ trans('validation.languages.es') }}</a></li>
                        </ul>
                    </li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('validation.template.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('validation.template.register') }}</a></li>
                    @else
                        @if  (Auth::user()->role == "admin")
                            @include('layouts.nav.admin')
                        @elseif(Auth::user()->role == "client")
                            @include('layouts.nav.client')
                        @endif        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                            <li><a href="{!! route('users.edit', [Auth::user()->id]) !!}"><i class="fa fa-btn fa-user"></i>{{ trans('validation.template.profile') }}</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>{{ trans('validation.template.logout')}}</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>