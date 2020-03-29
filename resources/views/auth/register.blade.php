@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <!-- subheader -->
    <section id="subheader" class="s2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-middle">
                    <h1>Register</h1>
                </div>

                <div class="col-md-6 text-middle">
                    <ul class="crumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="sep"></li>
                        <li>Register</li>
                    </ul>
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
                    <div class="col-md-8 col-md-offset-2">
                        <h3>Don't have an account? Register now.</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <form  class="form-border" method="post" action="{{ route('register') }}">
                            @csrf


                            <div class="row">

                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>Name:</label>

                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>Email Address:</label>

                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6" >
                                    <div class="field-set">
                                        <label>Choose a Username:</label>
                                        <input type='text' id='username' value="{{old('username')}}" name="username" class="form-control @error('username') is-invalid @enderror">
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 " >
                                    <div class="field-set">
                                        <label>Phone:</label>
                                        <input type='text'  id='phone' name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>Password:</label>

                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="field-set">
                                        <label>Re-enter Password:</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>



                                <div class="spacer-single"></div>

                                <div class="col-md-12">

                                    <div id='submit' class="pull-left">
                                        <input type='submit'  value='Register Now' class="btn btn-custom color-2">
                                    </div>

                                    <div id='mail_success' class='success'>Your message has been sent successfully.</div>
                                    <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.</div>
                                    <div class="clearfix"></div>

                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </section>
        <!-- section close -->

    </div>
    <!-- content close -->


@endsection
