<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('assets2/css/material-dashboard.css') }}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets2/css/demo.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    @yield('head')
</head>

<body>
@yield('layout')

<!--   Core JS Files   -->
<script src="{{ asset('assets2/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets2/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
@yield('js')
</body>

</html>