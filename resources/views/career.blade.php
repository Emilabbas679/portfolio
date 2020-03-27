@extends('layouts.app')
@section('title', 'Career')
@section('content')

    <!-- subheader -->
    <section id="subheader" class="dark no-top no-bottom" data-bgimage="url(images/background/sb1.jpg)" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Career</h1>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep"></li>
                            <li>Career</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="expand-list">
                        @foreach($careers as $c)
                            <div class="expand-custom">
                                <div class="table">
                                    <div class="c1">
                                        <img src="images/career/avatar.png" alt="">
                                    </div>
                                    <div class="c2">
                                        <h3>{{$c->position}}</h3>
                                        <p>
                                            {!! $c->about !!}
                                        </p>
                                    </div>
                                    <div class="c3">
                                        <span class="toggle"></span>
                                    </div>
                                </div>



                                <div class="details">
                                    <div class="row">
                                        <div class="col-md-6 requirements">
                                            <h4>Requirements</h4>
                                            {!!  $c->requirements !!}
                                        </div>

                                        <div class="col-md-6 offers">
                                            <h4>What We Offer</h4>
                                            {!! $c->offers !!}
                                        </div>

                                        <div class="spacer-single"></div>

                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-custom">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- content close -->


    @endsection


@push('js')
    <script>
        $('div.requirements ul').addClass('list s1');
        $('div.offers ul').addClass('list s2');
    </script>

    @endpush
