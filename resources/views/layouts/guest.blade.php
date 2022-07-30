<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>Deliveboo</title>
    <link rel="shortcut icon" href="https://cwa.roocdn.com/_next/static/favicon-32x32.9ac59871.png" type="image/png" sizes="32x32">

    <!-- Scripts -->
    <script src="{{ asset('js/front.js') }}" defer></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
</head>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')
</body>

</html>