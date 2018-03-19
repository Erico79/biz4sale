@extends('layouts.landing')
@section('title', 'Home')

@push('js')
    <!--//Page Specific JS -->
    <script type="text/javascript" src="{{ asset('assets/js/home.js') }}"></script>
    <script>
        @if(count($errors->all()))
            $('#signup-modal').modal('show');
        @endif

        @if(session()->has('login'))
            $('#login-modal').modal('show');
        @endif
    </script>
@endpush

@section('content')
    <section class="promo-section section section-on-bg">
        <div class="hero-slider-wrapper">
            <div class="flexslider hero-slider">
                <ul class="slides">
                    <li class="slide slide-1" style="background: #35373C url('{{asset('images/home.jpeg') }}') no-repeat 50% top;"></li>
                    {{--<li class="slide slide-2" style="background: #35373C url('{{asset('assets/images/hero/hero-2.jpg') }}') no-repeat 50% top;"></li>--}}
                    {{--<li class="slide slide-3" style="background: #35373C url('{{asset('assets/images/hero/hero-3.jpg') }}') no-repeat 50% top;"></li>--}}
                </ul>
            </div>
            <div class="hero-slider-mask"></div>
        </div><!--//hero-slider-wrapper-->
        <div class="container promo-content">
            <h2 class="headline">Sell your business online!</h2>
            <p class="tagline">Register today to post the business for sale and get connected to a potential buyer.</p>
            <div class="actions">
                <a class="btn btn-cta btn-primary" href="#" data-toggle="modal" data-target="#signup-modal">Register as a Seller</a>
                <a class="play-trigger" href="#" data-toggle="modal" data-target="#signup-modal">Register as a Buyer</a>
            </div>
        </div><!--//container-->
    </section><!--//promo-section-->

    {{--@include('sections')--}}

    {{--modals--}}
    <!-- Login Modal -->
    <div class="modal modal-auth modal-login" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id="loginModalLabel" class="modal-title text-center">Log in to your account</h4>
                </div>
                <div class="modal-body">
                    {{--<div class="social-login text-center">--}}
                        {{--<ul class="social-buttons list-unstyled">--}}
                            {{--<li><a href="#" class="btn btn-social btn-google btn-block"><i class="fa fa-google" aria-hidden="true"></i><span class="btn-text">Log in with Google</span></a></li>--}}
                            {{--<li><a href="#" class="btn btn-social btn-facebook btn-block"><i class="fa fa-facebook" aria-hidden="true"></i><span class="btn-text">Log in with Facebook</span></a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    <div class="divider">
                        <span class="or-text">OR</span>
                    </div>
                    <div class="login-form-container">
                        <form class="login-form">
                            <div class="form-group email">
                                <i class="material-icons icon">&#xE0BE;</i>
                                <label class="sr-only" for="login-email">Email</label>
                                <input id="login-email" name="login-email" type="email" class="form-control login-email" placeholder="Email">
                            </div><!--//form-group-->
                            <div class="form-group password">
                                <i class="material-icons icon">&#xE897;</i>
                                <label class="sr-only" for="login-password">Password</label>
                                <input id="login-password" name="login-password" type="password" class="form-control login-password" placeholder="Password">
                            </div><!--//form-group-->
                            <div class="form-group">
                                <div class="extra">
                                    <div class="checkbox remember">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember me
                                        </label>
                                    </div><!--//check-box-->
                                    <div class="forgotten-password">
                                        <a href="#" id="resetpass-link" data-toggle="modal" data-target="#resetpass-modal">Forgotten password?</a>
                                    </div>
                                </div><!--//extra-->
                            </div>
                            <button type="submit" class="btn btn-cta btn-block btn-primary">Log in</button>
                        </form>
                    </div><!--//login-form-container-->
                </div><!--//modal-body-->

            </div><!--//modal-content-->
        </div><!--//modal-dialog-->
    </div><!--//modal-->

    <!-- Signup Modal -->
    <div class="modal modal-auth modal-signup" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="signupModalLabel" class="modal-title text-center">Business Owner Registeration</h3>
                </div>
                <div class="modal-body">
                    <div class="social-login text-center">
                        <ul class="social-buttons list-unstyled">
                            <li><a href="#" class="btn btn-social btn-google btn-block"><i class="fa fa-google" aria-hidden="true"></i><span class="btn-text">Sign up with Google</span></a></li>
                            <li>
                                <a href="#" class="btn btn-social btn-linkedin btn-block">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    <span class="btn-text">Sign up with LinkedIn</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="divider">
                        <span class="or-text">OR</span>
                    </div>
                    <div class="login-form-container">
                        @include('common.warnings')
                        <form class="login-form" action="{{ url('register/seller') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group firstname has-danger">
                                        <i class="material-icons icon">&#xE7FD;</i>
                                        <label class="sr-only" for="signup-firstname">First Name</label>
                                        <input id="signup-firstname" value="{{ old('first_name') }}" name="first_name" type="text" class="form-control" placeholder="Your First Name" required>
                                    </div><!--//form-group-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group lastname">
                                        <i class="material-icons icon">&#xE7FD;</i>
                                        <label class="sr-only" for="signup-lastname">Last Name</label>
                                        <input id="signup-lastname" value="{{ old('last_name') }}" name="last_name" type="text" class="form-control" placeholder="Your Last Name" required>
                                    </div><!--//form-group-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group email">
                                        <i class="material-icons icon">&#xE0BE;</i>
                                        <label class="sr-only" for="signup-email">Email Address</label>
                                        <input id="signup-email" value="{{ old('email') }}" name="email" type="email" class="form-control" placeholder="Your Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group email">
                                        <i class="material-icons icon">phone</i>
                                        <label class="sr-only" for="signup-phone">Mobile No</label>
                                        <input id="signup-phone" value="{{ old('phone_no') }}" name="phone_no" type="text" minlength="10" maxlength="10"
                                               class="form-control" placeholder="Your Mobile No" required title="Your mobile no must be at least 10 characters long e.g. 0712123456">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group password">
                                        <i class="material-icons icon">&#xE897;</i>
                                        <label class="sr-only" for="signup-password">Create a Password</label>
                                        <input id="signup-password" name="password" type="password" class="form-control" placeholder="Create a Password">
                                    </div><!--//form-group-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group password">
                                        <i class="material-icons icon">&#xE897;</i>
                                        <label class="sr-only" for="signup-password2">Repeat Password</label>
                                        <input id="signup-password2" name="password_confirmation" type="password" class="form-control" placeholder="Repeat Password">
                                    </div><!--//form-group-->
                                </div>
                            </div>
                            <div class="legal-note">By signing up, you agree to our terms of services and privacy policy.</div>
                            <button type="submit" class="btn btn-block btn-primary btn-cta">Sign up</button>

                        </form>
                    </div><!--//login-form-container-->
                    <div class="option-container">
                        <div class="lead-text">Already have an account?</div>
                        <a class="login-link btn btn-ghost-alt" id="login-link" href="#">Log in</a>
                    </div><!--//option-container-->
                </div><!--//modal-body-->
            </div><!--//modal-content-->
        </div><!--//modal-dialog-->
    </div><!--//modal-->

    <!-- Reset Password Modal -->
    <div class="modal modal-auth modal-resetpass" id="resetpass-modal" tabindex="-1" role="dialog" aria-labelledby="resetpassModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 id="resetpassModalLabel" class="modal-title text-center">Forgot your password?</h4>
                </div>
                <div class="modal-body">
                    <div class="resetpass-form-container">
                        <p class="intro">We'll email you a link to a page where you can easily create a new password.</p>
                        <form class="resetpass-form">
                            <div class="form-group email">
                                <label class="sr-only" for="reg-email">Your Email</label>
                                <input id="reg-email" name="reg-email" type="email" class="form-control login-email" placeholder="Your Email">
                            </div><!--//form-group-->
                            <button type="submit" class="btn btn-block btn-secondary btn-cta">Reset Password</button>
                        </form>
                    </div><!--//login-form-container-->
                    <div class="option-container">
                        <div class="lead-text">I want to <a class="back-to-login-link" id="back-to-login-link" href="#">return to login</a></div>
                    </div><!--//option-container-->
                </div><!--//modal-body-->
            </div><!--//modal-content-->
        </div><!--//modal-dialog-->
    </div><!--//modal-->
@endsection