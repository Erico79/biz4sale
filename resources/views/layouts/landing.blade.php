@extends('layouts.front')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/plugins/flexslider/flexslider.css') }}">
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
    @stack('js')
@endsection