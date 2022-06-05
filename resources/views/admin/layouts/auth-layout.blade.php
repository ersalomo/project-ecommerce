<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle')</title>
    <base href="/">
    <link href="bootstrap/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="bootstrap/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="bootstrap/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="bootstrap/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    @stack('stylesheets')
    @livewireStyles
    <link href="./back/dist/css/demo.min.css" rel="stylesheet" />

</head>

<body>
    <div>
        @yield('content')
    </div>
    <script src="bootstrap/back/dist/js/tabler.min.js"></script>
    @stack('scripts')
    @livewireScripts
    <script src="bootstrap/back/dist/js/demo.min.js"></script>
</body>

</html>
