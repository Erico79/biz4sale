<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
</head>

<body data-spy="scroll" data-target="#page-nav">
@yield('layout')

<!-- Javascript -->
@yield('js')

</body>
</html>

