<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
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
                    <a href="{{ url('/') }}">
                        <img src="http://cdn.gfm.co.uk/gfms/images/graphics/general/gfm-masthead.jpg" height="30" class="header__logo">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li><a href="{{ route('create.post') }}">Create job</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- footer -->
    <footer class="footer" role="contentinfo">

        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h4>Our Brands</h4>
                    <ul class="footer__links">
                        <li><a href="https://gfm.co.uk/our-history/" title="Clear Comms brand">ClearComms</a></li>
                        <li><a href="https://gfm.co.uk/our-history/" title="Unit 6 brand">Unit 6</a></li>
                        <li><a href="https://gfm.co.uk/our-history/" title="Breakfree Holidays brand">Breakfree Holidays</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>News</h4>
                    <ul class="footer__links">
                        <li><a href="https://gfm.co.uk/our-history/" title="Press Releases">Press Releases</a></li>
                        <li><a href="https://gfm.co.uk/our-history/" title="Blog">Blog</a></li>
                        <li><a href="https://gfm.co.uk/our-history/" title="Newsletters">Newsletters</a></li>
                        <li><a href="https://gfm.co.uk/our-history/" title="Downloads">Downloads</a></li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <h4>About Us</h4>
                    <ul class="footer__links">
                        <li><a href="https://gfm.co.uk/our-history/" title="Our History">Our History</a></li>
                        <li><a href="https://gfm.co.uk/our-people/" title="Our People">Our People</a></li>
                        <li><a href="https://gfm.co.uk/csr/" title="CSR">CSR</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="footer__copyright">
                        &copy; <?php echo date('Y'); ?> Copyright GFM Holdings 2017
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- /footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
