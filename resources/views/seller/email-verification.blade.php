@extends('layouts.verification')
@section('title', 'Email Verification')

@section('content')
    <section class="heading-section section section-on-bg">
        <div class="hero-wrapper">
            <div class="hero-holder"></div>
            <div class="hero-mask-solid"></div>
        </div><!--//hero-wrapper-->
        <div class="container heading-content">
            <h2 class="headline">Confirm Your Email</h2>
            <div class="meta">
                A Confirmation Email has been sent to your inbox.
                <br class="d-none d-md-block">Please confirm your email first to proceed.
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-default"><i class="fa fa-envelope-o"></i> Resend</button>
                <button class="btn btn-success">Proceed <i class="fa fa-arrow-right"></i></button>
            </div>
        </div><!--//container-->
    </section><!--//heading-section-->
@endsection