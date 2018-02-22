<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ URL::asset('assets/img/favicon.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ URL::asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ URL::asset('assets/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
@include('layouts.partials.nav')
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="{{ URL::asset('assets/img/login.jpeg') }}">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="card card-login">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title">Login</h4>
                                    <div class="social-line">
                                        {{--<a href="#btn" class="btn btn-just-icon btn-simple">--}}
                                        {{--<i class="fa fa-facebook-square"></i>--}}
                                        {{--</a>--}}
                                        {{--<a href="#pablo" class="btn btn-just-icon btn-simple">--}}
                                        {{--<i class="fa fa-twitter"></i>--}}
                                        {{--</a>--}}
                                        {{--<a href="#eugen" class="btn btn-just-icon btn-simple">--}}
                                        {{--<i class="fa fa-google-plus"></i>--}}
                                        {{--</a>--}}
                                    </div>
                                </div>
                                {{--<p class="category text-center">--}}
                                {{--Or Be Classical--}}
                                {{--</p>--}}
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-md-12" style="margin-left: 10px;">
                                            @include('layouts.common.error')
                                        </div>
                                    </div>

                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                        <div class="form-group label-floating has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label">Email address</label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>

                                        </div>
                                    </div>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{ URL::asset('assets/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/material.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ URL::asset('assets/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>--}}
<!-- Forms Validations Plugin -->
{{--<script src="{{ URL::asset('assets/js/jquery.validate.min.js') }}"></script>--}}
{{--<!--  Plugin for Date Time Picker and Full Calendar Plugin-->--}}
{{--<script src="{{ URL::asset('assets/js/moment.min.js') }}"></script>--}}
{{--<!--  Charts Plugin -->--}}
{{--<script src="{{ URL::asset('assets/js/chartist.min.js') }}"></script>--}}
{{--<!--  Plugin for the Wizard -->--}}
{{--<script src="{{ URL::asset('assets/js/jquery.bootstrap-wizard.js') }}"></script>--}}
<!--  Notifications Plugin    -->
{{--<script src="{{ URL::asset('assets/js/bootstrap-notify.js') }}"></script>--}}
<!-- DateTimePicker Plugin -->
{{--<script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.js') }}"></script>--}}
<!-- Vector Map plugin -->
{{--<script src="{{ URL::asset('assets/js/jquery-jvectormap.js') }}"></script>--}}
<!-- Sliders Plugin -->
{{--<script src="{{ URL::asset('assets/js/nouislider.min.js') }}"></script>--}}
<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}
<!-- Select Plugin -->
{{--<script src="{{ URL::asset('assets/js/jquery.select-bootstrap.js') }}"></script>--}}
<!--  DataTables.net Plugin    -->
{{--<script src="{{ URL::asset('assets/js/jquery.datatables.js') }}"></script>--}}
<!-- Sweet Alert 2 plugin -->
{{--<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>--}}
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
{{--<script src="{{ URL::asset('assets/js/jasny-bootstrap.min.js') }}"></script>--}}
<!--  Full Calendar Plugin    -->
{{--<script src="{{ URL::asset('assets/js/fullcalendar.min.js') }}"></script>--}}
<!-- TagsInput Plugin -->
{{--<script src="{{ URL::asset('assets/js/jquery.tagsinput.js') }}"></script>--}}
<!-- Material Dashboard javascript methods -->
{{--<script src="{{ URL::asset('assets/js/material-dashboard.js') }}"></script>--}}
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ URL::asset('assets/js/demo.js') }}"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>