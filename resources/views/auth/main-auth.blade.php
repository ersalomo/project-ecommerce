<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="bootstrap/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="bootstrap/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="bootstrap/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <base href="/">
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
