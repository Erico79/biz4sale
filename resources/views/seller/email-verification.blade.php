@extends('layouts.verification')
@section('title', 'Email Verification')

@section('content')
    <section class="heading-section section section-on-bg">
        <div class="hero-wrapper">
            <div class="hero-holder" style="background-image: url('{{ asset('assets/images/hero/hero-contact.jpg') }}');"></div>
            <div class="hero-mask-solid"></div>
        </div><!--//hero-wrapper-->
        <div class="container heading-content">
            <h2 class="headline">Confirm Your Email</h2>
            <div class="meta">
                A Confirmation Email has been sent to your inbox at <b>{{ auth()->user()->email }}</b>.
                <br class="d-none d-md-block">Please confirm your email first to proceed.
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-default"><i class="fa fa-envelope-o"></i> Resend</button>
                <a href="{{ url('business-listing') }}" class="btn btn-success">Proceed <i class="fa fa-arrow-right"></i></a>
            </div>
        </div><!--//container-->
    </section><!--//heading-section-->
@endsection