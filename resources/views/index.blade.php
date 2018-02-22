@section('title','Home')
@extends('layouts.sub')
@push('css')
    <link rel="stylesheet" href="{{ asset('front/assets/css/food-panda.css')}}" />
    <style>
        section{
            padding: 0;
        }
    </style>
    @endpush
@section('content')
    <!-- head section -->
    @if(!empty($partner))
    <section class="page-title parallax3 parallax-fix page-title-large page-title-shop" style="padding-top:100px;min-height: 350px;">
        <div class="opacity-light bg-dark-gray"></div>
        <img class="parallax-background-img" src="{{ asset("img/homepage-splash.jpg") }}" alt="" />
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 wow fadeIn">

                        <div class="vendor-heading">
                            <div class="vendor-image">
                                <img alt="{{ $partner->store_name }}" width="80" height="80" src="{{ $partner->image }}" data-src="{{ $partner->image }}" class="lazy-loaded">
                            </div>

                            <div class="vendor-heading-details-box-container">
                                <div class="vendor-heading-details-box">
                                    <div class="vendor__title">
                                        <h1 itemprop="name">{{ $partner->store_name }}</h1>
                                    </div>

                                    {{--<ul class="vendor__cuisines"><li itemprop="servesCuisine"><a href="/restaurants/cuisines/continental">Continental</a></li><li itemprop="servesCuisine"><a href="/restaurants/cuisines/chicken">Chicken</a></li></ul>--}}
                                   {{-- <div class="vendor__ratings-container">
                                        <div class="vendor__ratings">
                                            <div class="rating  ">
                                                <i class="icon icon-star-ratings-full active-star"></i><i class="icon icon-star-ratings-full active-star"></i><i class="icon icon-star-ratings-full active-star"></i><i class="icon icon-star-ratings-full active-star"></i><i class="icon icon-star-ratings-half half-star-left active-star"></i>
                                                <i class="icon icon-star-ratings-half half-star-right inactive-star"></i>
                                                <span class="rating-score hide" itemprop="ratingValue" content="4.6">4.6</span>

                                                <span class="review">
                                                    (<span itemprop="ratingCount">1272</span>)
                                                </span>
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>


                    <!-- page title tagline -->
                    {{--<span class="text-uppercase white-text">Since 1982 brand</span>--}}
                    {{--<!-- end title tagline -->--}}
                    {{--<!-- page title -->--}}
                    {{--<h1 class="white-text">Collection</h1>--}}
                    <!-- end page title -->
                </div>
                {{--<div class="col-md-12 col-sm-12 breadcrumb text-uppercase margin-three no-margin-bottom wow fadeIn">--}}
                    {{--<!-- breadcrumb -->--}}
                    {{--<ul>--}}
                        {{--<li><a class="white-text" href="#">Home</a></li>--}}
                        {{--<li class="white-text"><a class="white-text" href="#">Shop</a></li>--}}
                        {{--<li class="white-text">Collection</li>--}}
                    {{--</ul>--}}
                    {{--<!-- end breadcrumb -->--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- end head section -->
    <!-- content section -->
    {{--<div class="container-alex">--}}
        <div class="breadcrumbs">
            <div class="container">
                <ol class="breadcrumbs__pages">
                    <li class="breadcrumbs__pages__item" >
                        <a href="{{ url("index") }}" itemprop="url">
                            <span itemprop="title">Home</span>
                        </a>
                    </li>
                    <li class="breadcrumbs__pages__item" >
                        {{--<a href="https://food.jumia.co.ke/restaurants" itemprop="url">--}}
                            <span itemprop="title">Partners</span>
                        </a>
                    </li>
                    <li class="breadcrumbs__pages__item" >
                        <span itemprop="title">{{ $partner->store_name }}</span>
                    </li>

                </ol>
            </div>
        </div>


        <main class="js-sticky-height-calculate-container">
            <div class="container" style="width: 80%">
                <div class="vendor-view-container js-sticky-height-calculate-container js-tooltip-container" >
                    <section class="row">
                        <div class="cart-container cart-container--vendor"  >
                            <div class="js-sticky-element" style="">
                                <div class="cart cart--vendor">
                                    <div class="cart__inner">
                                        <div class="spinner" role="progressbar" style="display:none;position: absolute; width: 0px; z-index: 2000000000; left: 50%; top: 50%;"><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-0-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(0deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-1-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(32deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-2-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(65deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-3-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(98deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-4-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(130deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-5-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(163deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-6-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(196deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-7-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(229deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-8-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(261deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-9-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(294deg) translate(5px, 0px); border-radius: 0px;"></div></div><div style="position: absolute; top: -1px; transform: translate3d(0px, 0px, 0px); opacity: 0.25; animation: opacity-30-25-10-11 0.833333s linear infinite;"><div style="position: absolute; width: 8px; height: 2px; background: rgb(0, 0, 0); box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 1px; transform-origin: left center 0px; transform: rotate(327deg) translate(5px, 0px); border-radius: 0px;"></div></div></div>
                                        <div class="cart__content">

                                            <div class="cart__header">
                                                <div class="cart__header__title">
                                                    <span class="default-delivery-label">Your order</span>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div id="cart-table" style="">
                                            <div class="cart__products" style="max-height: none;">
                                                <input type="hidden" value="{{ url('prodMenu') }}" id="prod-action">
                                                <input type="hidden" value="{{ url('checkout') }}" id="checkout-url">
                                                <input type="hidden" id="mobile-route" value="{{ url("mobile") }}">
                                                <input type="hidden" id="partner-id" value="{{ $partner->id }}">
                                                <table class="" id="tb">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="cart__summary cart-summary" id="" style="display: none;">
                                                <table>
                                                    <tbody>
                                                    {{--<tr class="subtotal">--}}
                                                        {{--<td></td>--}}
                                                        {{--<td class="title">Subtotal</td>--}}
                                                        {{--<td class="price">1,140Ksh</td>--}}
                                                    {{--</tr>--}}
                                                    {{--<tr class="vat">--}}
                                                        {{--<td></td>--}}
                                                        {{--<td class="title">--}}
                                                            {{--Including VAT--}}
                                                        {{--</td>--}}
                                                        {{--<td class="price">171Ksh</td>--}}
                                                    {{--</tr>--}}
                                                    <tr class="total">
                                                        <td></td>
                                                        <td colspan="2" class="title ">
                                                            <div>
                                                                <span>Total</span>
                                                                <span class="total-price" id="total">

                                                                  </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="cart__checkout cart-summary" style="display: none;">
                                                <a onclick="proceedToCheckout()" class="btn btn-primary btn-block btn-lg js-checkout-btn">
                                                    Proceed to checkout
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                                        {{--<div class="cart__empty cart__empty--outside">--}}
                                            {{--<ul class="cart__empty__elements">--}}
                                                {{--<li>--}}
                                                {{--<span class="title">--}}
                                                    {{--Delivery fee:--}}
                                                {{--</span>--}}
                                                {{--<span class="value">--}}
                                                    {{--100Ksh--}}
                                                {{--</span>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                    {{--<span class="title">Accepts Vouchers</span>--}}
                                                {{--</li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    </div>

                                    {{--<script>

                                        FD
                                            .setControllerConfig('Cart', 'enable', true)
                                            .setControllerConfig('Cart', 'cartRefreshUrl', "\/cart\/show-cart\/k0rm")
                                            .setControllerConfig('Cart', 'showPopupIfMinimumOrderAmountIsNotReached', false)
                                        ;
                                    </script>--}}
                                </div>
                            </div>

                        </div>

                        <div class="vendor-body-container">
                            <ul class="nav nav-tabs vendor-tabs">
                                <li class="vendor-tabs__menu active">
                                    <a href="#menu" class="js-tab">Menu</a>
                                </li>
                                {{--<li class="vendor-tabs__info">--}}
                                    {{--<a href="#info" class="js-tab">Info</a>--}}
                                {{--</li>--}}
                            </ul>

                            <section class="tab-content">
                                <div class="tab-pane active" id="menu">
                                    <div class="vendor-menu">
                                        <aside class="vendor-menu__categories">
                                            <div id="sticky-wrapper" class="sticky-wrapper" style="height: 168px;">
                                                <div class="js-sticky-element js-vendor-detail-menu-categories" data-sticky-bottom-margin="40" style="">
                                                   <?php
                                                    $con = new \App\Http\Controllers\FrontEndController();
                                                    $con->displayMenus($products);
                                                    ?>
                                                </div>
                                            </div>
                                        </aside>
                                        <div class="vendor-menu__menus ">
                                            <?php
                                            $con->loadMenuProducts($products);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                </div>

            </div>
        </main>
    {{--</div>--}}
    @endif
    @endsection
@push("js")
    <script type="text/javascript" src="{{ asset('front/js/fp-head.js')}}"></script>
    <script type="text/javascript" src="{{ asset('front/js/food-panda.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        FD
            .setControllerConfig('VendorDetailTabs', 'enable', true)
            .setControllerConfig('VendorDetailProductVariation', 'enable', true)
            .setControllerConfig('VendorDetailMenuScrollSpy', 'enable', true)
            .setControllerConfig('ToggleElements', 'enable', true)
            .setControllerConfig('VendorDetailProductVariation', 'maximiumQuantityReachedMessage', 'You&#039;ve already selected the maximum')
        ;
    </script>

<script>

</script>

    <script src="{{URL::asset('js/shop-front.js') }}"></script>


    @endpush
