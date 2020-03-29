@extends('layouts.app')
@section('title', 'Contact')
@section('content')


    <!-- subheader -->
    <section id="subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                    <ul class="crumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="sep"></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <!-- section service begin -->
        <section id="section-contact" class="side-bg left no-top np-bottom" data-bgcolor="#f6f6f6">
            <div class="image-container col-md-7 pull-left" data-delay="0">
                <div class="background-image"></div>
            </div>

            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="col-md-7 lg-text-white">
                        <div class="inner-padding">
                            <h3>Get In Touch</h3>
                            <div class="spacer-half"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mask">
                                        <img src="images/misc/3.jpg" alt="" class="img-responsive mb30 wow fadeInUp">
                                    </div>
                                    <h3>Main Office</h3>
                                    <address class="s1">
                                        <span><i class="fa fa-map-marker fa-lg"></i>100 Mainstreet Center, Sydney</span>
                                        <span><i class="fa fa-phone fa-lg"></i>(208) 333 9296</span>
                                        <span><i class="fa fa-envelope-o fa-lg"></i><a href="mailto:contact@example.com">contact@example.com</a></span>
                                        <span><i class="fa fa-file-pdf-o fa-lg"></i><a href="#">Download Resume</a></span>
                                    </address>
                                </div>

                                <div class="col-md-6">
                                    <div class="mask">
                                        <img src="images/misc/4.jpg" alt="" class="img-responsive mb30 wow fadeInUp" data-wow-delay=".2s">
                                    </div>
                                    <h3>Branch Office</h3>
                                    <address class="s1">
                                        <span><i class="fa fa-map-marker fa-lg"></i>100 Mainstreet Center, Sydney</span>
                                        <span><i class="fa fa-phone fa-lg"></i>(208) 333 9296</span>
                                        <span><i class="fa fa-envelope-o fa-lg"></i><a href="mailto:contact@example.com">contact@example.com</a></span>
                                        <span><i class="fa fa-file-pdf-o fa-lg"></i><a href="#">Download Resume</a></span>
                                    </address>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="inner-padding">
                            <h3>Message Us</h3>
                            <form name="contactFormCustom" onsubmit="return validateForm()"  class="form-underline" method="post" action='{{route('send-message')}}'>
                                @csrf

                                <div class="field-set " style="padding-bottom: 10px">
                                    <input type='text' name='name' id='name' class="form-control" placeholder="Your Name">
                                    <span class="name-error-js invalid-feedback" style="display: none">Name is required</span>

                                </div>

                                <div class="field-set" style="padding-bottom: 10px">
                                    <input type='text' name='email' id='email' class="form-control" placeholder="Your Email">
                                    <span class="email-error-js invalid-feedback" style="display: none">Email is required</span>

                                </div>

                                <div class="field-set" style="padding-bottom: 10px">
                                    <input type='text' name='phone' id='phone' class="form-control" placeholder="Your Phone">
                                    <span class="phone-error-js invalid-feedback" style="display: none">Phone is required</span>

                                </div>

                                <div class="field-set">
                                    <textarea name='message' id='message' class="form-control" placeholder="Your Message"></textarea>
                                    <span class="msg-error-js invalid-feedback" style="display: none">Message is required</span>

                                </div>

                                <input id="Check1" name="Checks" type="checkbox" value="Item 1">
                                <label for="Check1">&nbsp; I agree to the <a href="#">terms and conditions</a></label>

                                <div class="spacer-half"></div>

                                <div id='submit'>
                                    <input type='submit' value='Submit Form' class="btn btn-custom color-2">
                                </div>
                                <div id='mail_success' class='success'>Your message has been sent successfully.</div>
                                <div id='mail_fail' class='error'>Sorry, error occured this time sending your message.</div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- section close -->
    </div>
    <!-- content close -->


    @endsection

@push('js')

    <script>
        function validateForm() {
            var name = document.forms["contactFormCustom"]["name"].value;
            var phone = document.forms['contactFormCustom']['phone'].value;
            var email = document.forms['contactFormCustom']['email'].value;
            var message = document.forms['contactFormCustom']['message'].value;
            console.log(name)
            if(phone == ''){
                $('.phone-error-js').show();
                $('#phone').addClass('error_input');
            }
            else{
                $('.phone-error-js').hide();
                $('#phone').removeClass('error_input');

            }


            if(name == ''){
                $('.name-error-js').show();
                $('#name').addClass('error_input');

            }
            else{
                $('.name-error-js').hide();
                $('#name').removeClass('error_input');

            }

            if(email == ''){
                $('.email-error-js').show('');
                $('#email').addClass('error_input');

            }
            else{
                $('.email-error-js').hide('');
                $('#email').removeClass('error_input');

            }

            if(message == ''){
                $('.msg-error-js').show('');
                $('#message').addClass('error_input');

            }
            else{
                $('.msg-error-js').hide('');
                $('#message').removeClass('error_input');

            }


            if(name == '' || message == "" || email=='' || phone == ''){
                return false;
            }
            else{
                return true;
            }

        }
    </script>

    @endpush
