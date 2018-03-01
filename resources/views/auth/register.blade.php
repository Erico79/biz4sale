@section('title','Register')
@extends('layouts.home')
@push('css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/front/assets/spinner/jm.spinner.css')}}" />
    <link rel="stylesheet" href="{{ asset('/front/smart-wizard/css/smart_wizard.css')}}" />
    <link rel="stylesheet" href="{{ asset('/front/smart-wizard/css/smart_wizard_theme_dots.css')}}" />

    <style>
        .opacity-full{
            opacity: 0.5;
        }
        .spinner{
            position: fixed;
            background: white;
            padding-left: 48%;
            padding-top: 20%;
            height: 100%;
            width: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
        }
    </style>
@endpush
@section('content')
    {{--<div class="box well">--}}
    <div class="spinner large">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
    {{--</div>--}}

    <nav style="display: none !important;" class="navbar navbar-default navbar-fixed-top nav-transparent overlay-nav sticky-nav nav-border-bottom bg-white" role="navigation"><div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6"><a class="logo-light" href="{{ url("/") }}"><img alt="" src="images/logo-white.png" class="logo" /></a><a class="logo-dark" href="index.html"><img alt="" src="images/logo-light.png" class="logo" /></a></div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="col-md-9 text-right">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ url('/') }}" class="inner-link">Home</a> </li>
                            <li><a href="" class="inner-link">All listings</a> </li>
                            {{--@guest--}}
                                {{--<li><a href="{{ url('login') }}" class="inner-link">Login</a> </li>--}}
                            {{--@else--}}
                                {{--<li><a href="{{ url('login') }}" class="inner-link">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a> </li>--}}
                            {{--@endguest--}}
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </nav>
    <!--end of navigation-->
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- SmartWizard html -->
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Email Address</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Name</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Address</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>Terms and Conditions</small></a></li>
                        </ul>

                        <div class="row">

                            <div id="step-1">
                                <div class="col-md-12">
                                    <h2>Your Email Address</h2>
                                    <div id="form-step-0" role="form" data-toggle="validator">
                                        <div class="form-group">
                                            <label for="email">Email address:</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Write your email address" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <h2>Your Name</h2>
                                <div id="form-step-1" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" id="email" placeholder="Write your name" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3">
                                <h2>Your Address</h2>
                                <div id="form-step-2" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="3" placeholder="Write your address..." required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-4" class="">
                                <h2>Terms and Conditions</h2>
                                <p>
                                    Terms and conditions: Keep your smile :)
                                </p>
                                <div id="form-step-3" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="terms">I agree with the T&C</label>
                                        <input type="checkbox" id="terms" data-error="Please accept the Terms and Conditions" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('js')
    <script src="{{ asset('front/js/home/home.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
    <script src="{{ asset('front/smart-wizard/js/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('front/js/register/register.js') }}"></script>
    {{--<script src="{{  asset('assets/spinner/jm.spinner.js') }}"></script>--}}

@endpush
