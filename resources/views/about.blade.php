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
                @foreach($abouts as $a)
                    @if($loop->iteration %2 == 1)
                        <div class="row table">
                            <div class="padding40">
                                {!! $a->content !!}
                            </div>
                            <div class="col-md-7 text-middle">
                                <img src="/public/uploads/about/{{$a->img}}" class="img-responsive" alt="">
                            </div>
                        </div>

                        @else
                        <div class="row table">
                            <div class="col-md-7 text-middle">
                                <img src="/public/uploads/about/{{$a->img}}" class="img-responsive" alt="">
                            </div>
                            <div class="col-md-6 text-middle">
                                <div class="padding40">
                                    {!! $a->content !!}
                                </div>
                            </div>
                        </div>

                        @endif

                        <div class="spacer-double"></div>

                @endforeach








            </div>
        </section>
    </div>
    <!-- content close -->


    @endsection
