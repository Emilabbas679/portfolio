@extends('layouts.app')

@section('content')

<div id="content" class="no-top no-bottom">
        <!-- section begin -->
        <section aria-label="section-login" class="full-height relative no-top no-bottom" data-stellar-background-ratio=".2" data-bgimage="url(/public/images/background/6.jpg">

            <div id="particles-js"></div>

            <div class="overlay-bg t80">
                <div class="center-y fadeScroll relative" data-scroll-speed="4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <form  class="form-border img-shadow" method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="padding40" data-bgcolor="#fff">
                                        <h3>Login to your account</h3>

                                        <div class="field-set">
                                            <label>E-mail</label>

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>


                                        <div class="field-set">
                                            <label>Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>


                                        <div class="spacer-single"></div>

                                        <div id='submit' class="pull-left">
                                            <input type='submit'  class="btn btn-custom color-2">
                                        </div>

                                        <a href="{{ route('password.request') }}" class="pull-right mt10">Forget password?</a>

                                        <div id='mail_success' class='success'>Your message has been sent successfully.</div>
                                        <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.</div>

                                        <div class="clearfix"></div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- section close -->
    </div>

@endsection
