@extends('layouts.front')

@section('head')
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