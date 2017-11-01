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
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <header class="header">
            <div class="container">
                <div>
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="http://lewi.sh/gfm/wp-content/uploads/2017/11/gfm-logo.png" height="30">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <nav class="nav">
                    <!-- Right Side Of Navbar -->
                    <ul class="">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li {{{ (Request::is('admin/home') ? 'class=active' : '') }}}><a href="{{ route('home') }}">Dashboard</a></li>
                            <li {{{ (Request::is('post/create') ? 'class=active' : '') }}}><a href="{{ route('create.post') }}">Create job</a></li>

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
                </nav>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))

                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                          @endif
                        @endforeach
                    </div> <!-- end .flash-message -->

                </div>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- footer -->
    <footer class="footer" role="contentinfo">

        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h4>Our Brands</h4>
                    <ul class="footer__links">
                        <li><a href="https://gfm.co.uk/brand/clear-comms" title="Clear Comms brand">ClearComms</a></li>
                        <li><a href="https://gfm.co.uk/brand/unit-6" title="Unit 6 brand">Unit 6</a></li>
                        <li><a href="https://gfm.co.uk/brand/breakfree-holidays" title="Breakfree Holidays brand">Breakfree Holidays</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>News</h4>
                    <ul class="footer__links">
                        <li><a href="https://gfm.co.uk/press-releases/" title="Press Releases">Press Releases</a></li>
                        <li><a href="https://gfm.co.uk/blog/" title="Blog">Blog</a></li>
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

    <script>
    window['_fs_debug'] = false;
    window['_fs_host'] = 'fullstory.com';
    window['_fs_org'] = '7V8MM';
    window['_fs_namespace'] = 'FS';
    (function(m,n,e,t,l,o,g,y){
        if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
        g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
        o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
        y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
        g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){g(l,v)};
        g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
        g.clearUserCookie=function(c,d,i){if(!c || document.cookie.match('fs_uid=[`;`]*`[`;`]*`[`;`]*`')){
        d=n.domain;while(1){n.cookie='fs_uid=;domain='+d+
        ';path=/;expires='+new Date(0).toUTCString();i=d.indexOf('.');if(i<0)break;d=d.slice(i+1)}}};
    })(window,document,window['_fs_namespace'],'script','user');
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
