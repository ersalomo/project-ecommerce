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
    <link href="bootstrap/dist/css/demo.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.min.css') }}">
    @stack('stylesheets')
    @livewireStyles
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.inc.header')
        <div class="page-wrapper">
            @yield('content')
        </div>
        @include('admin.layouts.inc.footer')
    </div>



    <script src="{{ asset('bootstrap/dist/libs/jQuery/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/iJabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('bootstrap/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/demo.min.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
