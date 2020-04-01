<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>
        @yield('title')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Linea is Creative Website Template">
    <meta name="keywords" content="business, clean, creative, corporate, light, minimal, modern, portfolio, website, template">
    <meta name="author" content="">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <!-- background -->
    <link rel="stylesheet" href="{{ asset('css/bg.css') }}" type="text/css">

    <!-- color scheme -->
    <link rel="stylesheet" id="colors" href="{{ asset('css/colors/blue.css') }}" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body id="homepage">

<div id="wrapper">

    <!-- header begin -->
    <header class="">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- logo begin -->
                    <div id="logo">
                        <a href="index.html">
                            <img class="logo" src="/public/images/logo-light.png" alt="">
                            <img class="logo-2" src="/public/images/logo-dark.png" alt="">
                        </a>
                    </div>
                    <!-- logo close -->

                    <!-- small button begin -->
                    <span id="menu-btn"></span>
                    <!-- small button close -->

                    <!-- mainmenu begin -->
                    <nav>
                        <ul id="mainmenu">
                            <li><a href="index.html">Home<span></span></a>
                                <ul class="mega">
                                    <li>
                                        <div class="container">
                                            <div class="menu-content">
                                                <div class="row">
                                                    <div class="col-md-3 hidden-sm">
                                                        <a href="index-dark.html" class="hover no-padding">
                                                            <img src="/public/images/misc/preview.jpg" class="img-responsive img-rounded" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <ul>
                                                            <li class="title">Homepage New</li>
                                                            <li><a href="index-dark.html">Homepage Dark</a></li>
                                                            <li><a href="index-startup.html">Homepage Startup</a></li>
                                                            <li><a href="index-boxed-1.html">Homepage Boxed Style</a></li>
                                                            <li><a href="index-personal.html">Homepage Personal</a></li>

                                                        </ul>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <ul>
                                                            <li class="title">Homepage Default</li>
                                                            <li><a href="index.html">Homepage 1</a></li>
                                                            <li><a href="index-2.html">Homepage 2</a></li>
                                                            <li><a href="index-3.html">Homepage 3</a></li>
                                                            <li><a href="index-4.html">Homepage 4</a></li>
                                                            <li><a href="index-5.html">Homepage 5</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <ul>
                                                            <li class="title">More Homepage</li>
                                                            <li><a href="coming-soon-1.html">Coming Soon 1</a></li>
                                                            <li><a href="coming-soon-2.html">Coming Soon 2</a></li>
                                                            <li><a href="maintenance.html">Maintenance</a></li>
                                                        </ul>
                                                    </div>

                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{route('about')}}">About Us <span></span></a></li>
                            <li><a href="{{route('site.career')}}">Career <span></span></a></li>
                            <li><a href="{{route('site.team')}}">Team <span></span></a></li>
                            <li><a href="{{route('site.news')}}">News <span></span></a></li>
                            <li><a href="{{route('site.contact')}}">Contact <span></span></a></li>


                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                        {{ __('Logout') }} <span></span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </li>


                            @else
                            <li><a href="{{route('login')}}">Login<span></span></a>
                                <ul>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    <li><a href="{{route('register')}}">Register</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- mainmenu close -->

                </div>


            </div>
        </div>
    </header>
    <!-- header close -->

@yield('content')

<!-- footer begin -->
    <footer>
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <h5>About Linea</h5>
                        <div class="tiny-border"><span></span></div>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-4 col-xs-4">
                            <div class="widget">
                                <h5>Company</h5>
                                <div class="tiny-border"><span></span></div>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Customers</a></li>
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Blog</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-4">
                            <div class="widget">
                                <h5>Services</h5>
                                <div class="tiny-border"><span></span></div>
                                <ul>
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Development</a></li>
                                    <li><a href="#">Animation</a></li>
                                    <li><a href="#">Mobile Apps</a></li>
                                    <li><a href="#">Campaign</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-4">
                            <div class="widget">
                                <h5>Help &amp; Support</h5>
                                <div class="tiny-border"><span></span></div>
                                <ul>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Live Chat</a></li>
                                    <li><a href="#">Terms of Services</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="subfooter">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        &copy; Copyright 2018 - Linea by Designesia
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer close -->

    <a href="#" id="back-to-top"></a>
    <div id="preloader">
        <div class="s1">
            <span></span>
            <span></span>
        </div>
    </div>
</div>



<!-- Javascript Files
================================================== -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('js/easing.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/jquery.countTo.js') }}"></script>
<script src="{{ asset('js/validation.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/enquire.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/jquery.plugin.js') }}"></script>
<script src="{{ asset('js/typed.js') }}"></script>
<script src="{{ asset('js/typed-custom.js') }}"></script>
<script src="{{ asset('js/particles.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/designesia.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        if (window.location.href.indexOf("/news") > -1 || window.location.href.indexOf("/contact") > -1 || window.location.href.indexOf("/register") > -1) {
            $('header').addClass('header-light')
        }
        else{
            $('header').removeClass('header-light')
        }
    });
</script>
@stack('js')

</body>

</html>
