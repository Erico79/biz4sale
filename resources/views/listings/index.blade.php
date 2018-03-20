@extends('layouts.landing')
@section('title', 'Upload your Business')

@section('content')
    <section id="signup-section" class="signup-section section">
        <div class="section-inner">
            <div class="container text-center">
                <div class="counter-container">
                </div><!--//counter-container-->

                <h2 class="counter-desc">Create your Listing</h2>

                <div class="form-wrapper">
                    <div class="form-box">
                        <h5>
                            <b>Step 1</b>
                            <i class="fa fa-arrow-right fa-1x"></i>
                            Step 2
                        </h5>
                        <h3 class="form-heading">Business Details</h3>
                        <div class="form-desc">Fields marked with an asterisk(*) are mandatory.</div>
                        <form class="signup-form">
                            <div class="divider"><h6><b class="text-dark">Listing Details</b></h6></div>
                            <div class="row">
                                <div class="form-group col-12 col-md-12">
                                    <label for="listing_headline" class="sr-only">Listing Title *</label>
                                    <input type="text" class="form-control" id="listing_headline" name="listing_headline" placeholder="Listing Title* e.g. " minlength="8" required>
                                </div><!--//form-group-->
                                <div class="form-group col-12 col-md-12">
                                    <label for="general_summary" class="sr-only">General Summary *</label>
                                    <textarea type="text" class="form-control" rows="5" id="general_summary" name="general_summary" placeholder="General Summary*" required></textarea>
                                </div><!--//form-group-->
                                <div class="form-group col-12 col-md-12">
                                    <label id="business_status" class="sr-only">Business Status</label>
                                    <select name="business_status" id="business_status" class="form-control" required>
                                        <option value="For Sale">For Sale</option>
                                        <option value="Under Offer">Under Offer</option>
                                        <option value="Sold">Sold (Subject to Contract)</option>
                                    </select>
                                </div><!--//form-group-->
                            </div><!--//row-->

                            <div class="divider"><h6><b class="text-dark">Business Categories - <small>You may attach your business upto 3 categories</small></b></h6></div>

                            <div class="row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="main_category" class="sr-only">Category 1</label>
                                    <select class="form-control main_category" readonly required>
                                        <option value="">--Main Category--</option>
                                    </select>
                                </div><!--//form-group-->
                                <div class="form-group col-12 col-md-4">
                                    <label for="sub_category" class="sr-only">Category 1</label>
                                    <select class="form-control sub_category" readonly required>
                                        <option value="">--Sub Category--</option>
                                    </select>
                                </div><!--//form-group-->
                                <div class="form-group col-12 col-md-4">
                                    <label for="category" class="sr-only">Category 1</label>
                                    <select name="categories[]" class="form-control category" readonly required>
                                        <option value="">--Category 1*--</option>
                                    </select>
                                </div><!--//form-group-->
                            </div><!--//row-->

                            <div class="row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="main_category" class="sr-only">Category 1</label>
                                    <select class="form-control main_category" readonly>
                                        <option value="">--Main Category--</option>
                                    </select>
                                </div><!--//form-group-->
                                <div class="form-group col-12 col-md-4">
                                    <label for="sub_category" class="sr-only">Category 1</label>
                                    <select class="form-control sub_category" readonly>
                                        <option value="">--Sub Category--</option>
                                    </select>
                                </div><!--//form-group--><div class="form-group col-12 col-md-4">
                                    <label for="category" class="sr-only">Category 1</label>
                                    <select name="categories[]" class="form-control category" readonly>
                                        <option value="">--Category 2--</option>
                                    </select>
                                </div><!--//form-group-->
                            </div><!--//row-->

                            <div class="row">
                                <div class="form-group col-12 col-md-4">
                                    <label for="main_category" class="sr-only">Category 1</label>
                                    <select class="form-control main_category" readonly>
                                        <option value="">--Main Category--</option>
                                    </select>
                                </div><!--//form-group-->
                                <div class="form-group col-12 col-md-4">
                                    <label for="sub_category" class="sr-only">Category 1</label>
                                    <select class="form-control sub_category" readonly>
                                        <option value="">--Sub Category--</option>
                                    </select>
                                </div><!--//form-group--><div class="form-group col-12 col-md-4">
                                    <label for="category" class="sr-only">Category 1</label>
                                    <select name="categories[]" class="form-control category" readonly>
                                        <option value="">--Category 3--</option>
                                    </select>
                                </div><!--//form-group-->
                            </div><!--//row-->

                            <div class="divider"><h6><b class="text-dark">City/Town - <small>Enter the City or Town where your business is located</small></b></h6></div>

                            <div class="row">
                                <div class="form-group col-12 col-md-12">
                                    <label for="city_town" class="sr-only">City/Town</label>
                                    <input type="text" name="city_town" required class="form-control" placeholder="City/Town"/>
                                </div>
                            </div>

                            <div class="divider"><h6><b class="text-dark">Property and Financial Details</b></h6></div>

                            <div class="row">
                                <div class="form-group col-12 col-md-12">
                                    <label for="city_town" class="sr-only">Property Status</label>
                                    <select name="property_status" required class="form-control" required>
                                        <option value="">--Select Property Status*--</option>
                                        <option value="Freehold">Real Property</option>
                                        <option value="Leasehold">Lease</option>
                                        <option value="Both">Both Freehold and Leasehold</option>
                                        <option value="N/A">Not Applicable</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row" id="freehold_asking_price_field">
                                <div class="form-group col-6 col-md-6">
                                    <label for="freehold_asking_price" class="sr-only">Freehold Asking Price</label>
                                    <select name="asking_price" class="form-control">
                                        <option value="">--Asking Price--</option>
                                        @if($prop_asking_prices)
                                            @foreach($prop_asking_prices as $price)
                                                <option value="{{ $price->id }}">{{ $price->price_range }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row both_fields">
                                <div class="form-group col-6 col-md-6">
                                    <label for="lease_asking_price" class="sr-only">--Asking Price--</label>
                                    <select name="lease_asking_price" class="form-control">
                                        <option value="">--Freehold Asking Price--</option>
                                        @if($prop_asking_prices)
                                            @foreach($prop_asking_prices as $price)
                                                <option value="{{ $price->id }}">{{ $price->price_range }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row both_fields">
                                <div class="form-group col-6 col-md-6">
                                    <label for="lease_asking_price" class="sr-only">--Asking Price--</label>
                                    <select name="lease_asking_price" class="form-control">
                                        <option value="">--Leasehold Asking Price--</option>
                                        @if($prop_asking_prices)
                                            @foreach($prop_asking_prices as $price)
                                                <option value="{{ $price->id }}">{{ $price->price_range }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-cta">Proceed to Step 2 <i class="fa fa-arrow-right"></i> </button>
                        </form><!--//form-->
                    </div><!--//form-box-->
                </div><!--//form-wrapper-->

            </div><!--//container-->
        </div><!--//section-inner-->
    </section><!--//signup-section-->
@endsection