<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Online Library
    </title>

    <meta name="keywords" content="">

    <!-- styles -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <link href="/css/animate.min.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">
    <link href="/css/owl.theme.css" rel="stylesheet">
    <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

    <!-- styles -->

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="/bootstrap-star-rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <link href="/bootstrap-star-rating/css/theme-krajee-svg.css" media="all" rel="stylesheet" type="text/css" />




    <!-- theme stylesheet -->
    <link href="/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->

    <script src="/js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">


    <script src="/js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">

    @yield("style")
</head>
<body>
<div id="top">
    <div class="container">
        <div class="col-md-6 offer" data-animate="fadeInDown">
        </div>

        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}"
                        >{!! \Illuminate\Support\Facades\Auth::user()->first_name !!}</a>
                    </li>
                    <li><a href="/auth/logout">Logout</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        @else
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="/register">Register</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        @endif

    </div>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Login</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>

                    <p class="text-center text-muted">Not registered yet?</p>
                    <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is
                        easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="/" data-animate-hover="bounce">
                <img src="/img/logo.png" alt="Obaju logo" class="hidden-xs">
                <img src="/img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a class="btn btn-default navbar-toggle"
                       href="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}/panier">
                        <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">{!! \Illuminate\Support\Facades\Session::get("number",0) !!} items in cart</span>
                    </a>
                @else
                    <a class="btn btn-default navbar-toggle"
                       href="/user/0/panier">
                        <i class="fa fa-shopping-cart"></i> <span class="hidden-xs">{!! \Illuminate\Support\Facades\Session::get("number",0) !!} items in cart</span>
                    </a>
                @endif
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="/">Home</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">BOOKS
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Category</h5>
                                        <ul>
                                            <li><a href="/livre/search/5">Scientific</a>
                                            </li>
                                            <li><a href="/livre/search/1">Literature</a>
                                            </li>
                                            <li><a href="/livre/search/2">Art</a>
                                            </li>
                                            <li><a href="/livre/search/4">Architecture</a>
                                            </li>
                                            <li><a href="/livre/search/3">History</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Language</h5>
                                        <ul>
                                            <li><a href="/livre/lang/1">French</a>
                                            </li>
                                            <li><a href="/livre/lang/2">English</a>
                                            </li>
                                            <li><a href="/livre/lang/3">Italian</a>
                                            </li>
                                            <li><a href="/livre/lang/4">German</a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>OLD BOOK</h5>
                                        <ul>
                                            <li><a href="category.html">
                                                    Literature</a>
                                            </li>
                                            <li><a href="category.html">
                                                    History</a>
                                            </li>
                                            <li><a href="category.html">Cultures and civilizations</a>
                                            </li>
                                            <li><a href="category.html">
                                                    Social science</a>
                                            </li>
                                            <li><a href="category.html">
                                                    Knowledge and traditions</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Featured</h5>
                                        <ul>
                                            <li><a href="category.html">
                                                    Illustrated books & Photos</a>
                                            </li>
                                            <li><a href="category.html">
                                                    Humor</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}">My Account</a>
                    </li>
                @endif


            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">


            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="/user/{{\Illuminate\Support\Facades\Auth::user()->client_id}}/panier"
                       class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span
                                class="hidden-sm">{!! \Illuminate\Support\Facades\Session::get("number",0) !!} items in cart</span></a>
                </div>
            @else
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="/user/0/panier" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span
                                class="hidden-sm">{!! \Illuminate\Support\Facades\Session::get("number",0) !!}  items in cart</span></a>
                </div>
                @endif
                        <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse"
                            data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search" method="POST" action="/livre/search">
                {!! csrf_field() !!}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="searchName" id="searchInput">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
</div>

@yield("content")
<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="text.html">About us</a>
                    </li>
                    <li><a href="text.html">Terms and conditions</a>
                    </li>
                    <li><a href="faq.html">FAQ</a>
                    </li>
                    <li><a href="contact.html"></a>
                    </li>
                </ul>

                <hr>

                <h4>User section</h4>

                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="/register">Register</a>
                    </li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Top categories</h4>
                <ul>
                    <li><a href="/livre/search/5">Scientific</a>
                    </li>
                    <li><a href="/livre/search/1">Literature</a>
                    </li>
                    <li><a href="/livre/search/2">Art</a>
                    </li>
                    <li><a href="/livre/search/4">Architecture</a>
                    </li>
                    <li><a href="/livre/search/3">History</a>
                    </li>
                </ul>
                <hr class="hidden-md hidden-lg">

            </div>
            <!-- /.col-md-3 -->

            <div class="col-md-4 col-sm-6">

                <h4>Where to find us</h4>

                <p><strong>INSAT</strong>
                    <br>Centre Urbain Nord
                    <br>BP 676-1080
                    <br>Tunis
                    <br>
                    <strong>Tunisia</strong>
                </p>

                <a href="contact.html">Go to contact page</a>

                <hr class="hidden-md hidden-lg">

            </div>


        </div>
        <!-- /.row -->

    </div>
</div>
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© 2016 Books online</p>

        </div>

    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/waypoints.min.js"></script>
<script src="/js/modernizr.js"></script>
<script src="/js/bootstrap-hover-dropdown.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/front.js"></script>
<script src="/bootstrap-star-rating/js/star-rating.js" type="text/javascript"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/js/script.js"></script>

<script>
    $(document).ready(function () {
        $("input:text").bind({

        });

        $("#searchInput").autocomplete({
            minlength : 1,
            source : '{{URL('getLivreByLettre')}}'
        });
    });


</script>
@yield("script")


</body>