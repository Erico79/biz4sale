@extends('layouts.verification')
@section('title', 'Phone No Verification')

@section('content')
    <section class="heading-section section section-on-bg">
        <div class="hero-wrapper">
            <div class="hero-holder"></div>
            <div class="hero-mask-solid"></div>
        </div><!--//hero-wrapper-->
        <div class="container heading-content">
            <h2 class="headline">Verify Your Mobile Phone Number</h2>
            <div class="meta">
                A verification SMS with a <b>4 digit code</b> has been sent to your phone on <b>{{ auth()->user()->masterfile->phone_no }}.</b>
                <br class="d-none d-md-block">Please enter the code below to proceed;
                <a href="{{ url('phone-code/resend') }}" class="btn btn-sm btn-dark" style="font-size: small"><i class="fa fa-refresh"></i> Resend Code</a>
            </div>
            <br/>
            @include('common.error')
            <form class="search-box form-inline text-center margin-bottom-lg justify-content-center">
                <label class="sr-only" for="help-search-form">Search</label>
                <div class="form-group">
                    <input id="help-search-form" name="search-form" type="text" style="width: 200px; margin-right: 5px;" class="form-control help-search-form"
                           placeholder="Enter the code here...">
                    <a href="{{ url('business-listing') }}" class="btn btn-success">Verify <i class="fa fa-arrow-right"></i></a>
                </div>
            </form>
        </div><!--//container-->
    </section><!--//heading-section-->
@endsection