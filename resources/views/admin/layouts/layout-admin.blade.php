<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle')</title>
    <base href="/">
    <link href="./back/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="./back/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="./back/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="./back/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="{{ asset('/back/dist/libs/iJabo/ijabo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/back/dist/libs/ijaboCroptool/ijaboCroptool.min.css') }}">
    <link href="./back/dist/css/demo.min.css" rel="stylesheet" />
    @stack('stylesheets')
    @livewireStyles
</head>

<body>
    <div>
        @yield('content')
    </div>


    <script src="{{ asset('back/dist/libs/jQuery/jquery.js') }}"></script>
    <script src="{{ asset('back/dist/libs/iJabo/ijabo.min.js') }}"></script>
    <script src="./back/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('back/dist/libs/ijaboCroptool/ijaboCropTool.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="./back/dist/js/tabler.min.js"></script>
    <script src="./back/dist/js/demo.min.js"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
