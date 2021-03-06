@extends('layouts.back')

@section('head')
    @stack('css')
@endsection

@section('layout')
    @include('layouts.partials.back.auth-nav')

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="{{ asset('assets2/img/login.jpeg') }}">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->

            @yield('content')

            @include('layouts.partials.back.footer')
        </div>
    </div>

@endsection

@section('js')
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('assets2/js/jquery.validate.min.js') }}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{ asset('assets2/js/moment.min.js') }}"></script>
    <!--  Charts Plugin -->
    <script src="{{ asset('assets2/js/chartist.min.js') }}"></script>
    <!--  Plugin for the Wizard -->
    <script src="{{ asset('assets2/js/jquery.bootstrap-wizard.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets2/js/bootstrap-notify.js') }}"></script>
    <!-- DateTimePicker Plugin -->
    <script src="{{ asset('assets2/js/bootstrap-datetimepicker.js') }}"></script>
    <!-- Vector Map plugin -->
    <script src="{{ asset('assets2/js/jquery-jvectormap.js') }}"></script>
    <!-- Sliders Plugin -->
    <script src="{{ asset('assets2/js/nouislider.min.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <!-- Select Plugin -->
    <script src="{{ asset('assets2/js/jquery.select-bootstrap.js') }}"></script>
    <!--  DataTables.net Plugin    -->
    <script src="{{ asset('assets2/js/jquery.datatables.js') }}"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('assets2/js/sweetalert2.js') }}"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{ asset('assets2/js/jasny-bootstrap.min.js') }}"></script>
    <!--  Full Calendar Plugin    -->
    <script src="{{ asset('assets2/js/fullcalendar.min.js') }}"></script>
    <!-- TagsInput Plugin -->
    <script src="{{ asset('assets2/js/jquery.tagsinput.js') }}"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="{{ asset('assets2/js/material-dashboard.js') }}"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets2/js/demo.js') }}"></script>
    <script type="text/javascript">
        $().ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
    @stack('js')
@endsection