<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/style_dua.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-grid.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <base href="/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('stylesheets')
    @livewireStyles
    <title>@yield('title')</title>
</head>

<body class=" border-top-wide border-primary d-flex flex-column" style="background-color:rgb(194, 195, 199)">
    <div class="page page-center">
        @yield('content')
    </div>
    @stack('scripts')
    @livewireScripts
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
