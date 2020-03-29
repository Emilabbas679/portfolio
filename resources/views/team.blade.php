@extends('layouts.app')
@section('title', 'Team')
@section('content')

    <!-- subheader -->
    <section id="subheader" class="dark no-top no-bottom" data-bgimage="url(images/background/sb1.jpg)" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Team</h1>
                        <ul class="crumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="sep"></li>
                            <li>Team</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section aria-label="section-team">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <h2 class="mb20">The Founder</h2>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                        </p>
                        <div class="spacer-single"></div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="sequence">
                    @foreach($members as $m)
                        <div class="col-md-3 sq-item wow">
                            <div class="profile_pic text-center">
                                <figure class="picframe mb30">
                                    <a class="image-popup" href="/public/uploads/members/{{$m->img}}">
                                        <span class="overlay-v">
                                            <span>{!! $m->content !!}</span>
                                        </span>
                                    </a>
                                    <img src="/public/uploads/members/{{$m->img}}" class="img-responsive" alt="">
                                </figure>

                                <h3>{{$m->name}}</h3>
                                <span class="subtitle">{{$m->position}}</span>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>

            </div>
        </section>

        <section aria-label="section-quote" class="no-bottom" data-bgcolor="#f2f2f2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="images/misc/1.png" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <blockquote class="s1">You don’t think your way to creative work. You work your way to creative thinking.</blockquote>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
                            ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <img src="images/misc/ttd.png" alt="" class="img-responsive">
                        <div class="spacer-single"></div>
                        <h3 class="mb10"><span>Oscar Helman</span></h3>
                        From the chairman desk
                    </div>
                </div>
            </div>
        </section>

        <!-- section begin -->
        <section id="section-fun-facts" class="bg-color pt40 pb40 text-light">
            <div class="container">

                <div class="row sequence">
                    <div class="col-md-3 sq-item wow">
                        <div class="de_count">
                            <h3 class="timer" data-to="16" data-speed="2500">0</h3>
                            <span>Art Director</span>
                        </div>
                    </div>

                    <div class="col-md-3 sq-item wow">
                        <div class="de_count">
                            <h3 class="timer" data-to="18">0</h3>
                            <span>Designer</span>
                        </div>
                    </div>

                    <div class="col-md-3 sq-item wow" data-wow-delay=".5s">
                        <div class="de_count">
                            <h3 class="timer" data-to="15">0</h3>
                            <span>Developer</span>
                        </div>
                    </div>

                    <div class="col-md-3 sq-item wow">
                        <div class="de_count">
                            <h3 class="timer" data-to="12" data-speed="2500">0</h3>
                            <span>Animator</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

    </div>
    <!-- content close -->




@endsection
