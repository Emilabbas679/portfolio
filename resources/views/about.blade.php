@extends('layouts.app')
@section('title', 'About us')
@section('content')
    <!-- subheader -->
    <section id="subheader" class="dark no-top no-bottom" data-bgimage="url(images/background/sb1.jpg)" data-stellar-background-ratio=".2">
        <div class="overlay-bg t70">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>About Us</h1>
                        <ul class="crumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="sep"></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section aria-label="section-services">
            <div class="container">
                <div class="row table">
                    <div class="padding40">
                        <h2 class="mb20"><span class="uptitle">We Are</span> Linea Creative</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="col-md-7 text-middle">
                        <img src="images/misc/5.jpg" class="img-responsive" alt="">
                    </div>
                </div>

                <div class="spacer-double"></div>

                <div class="row table">
                    <div class="col-md-7 text-middle">
                        <img src="images/misc/6.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-6 text-middle">
                        <div class="padding40">
                            <h2 class="mb20"><span class="uptitle">We Love</span> Work Together</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->


    @endsection
