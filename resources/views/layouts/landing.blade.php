@extends('layouts.front')

@section('head')
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,300italic,400italic,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/plugins/flexslider/flexslider.css') }}">

    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    @stack('css')
@endsection

@section('layout')
    <!-- ******HEADER****** -->
    @include('layouts.partials.header')

    @yield('content')

    <!-- ******FOOTER****** -->
    @include('layouts.partials.footer')
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/back-to-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-scrollTo/jquery.scrollTo.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/flexslider/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    @stack('js')
@endsection