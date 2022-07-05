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
    <link href="bootstrap/dist/libs/iJabo/ijabo.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/libs/ijaboCroptool/ijaboCroptool.min.css') }}">
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
    <script src="{{ asset('bootstrap/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/demo.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/iJabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/ijaboCroptool/ijaboCropTool.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>
<script>
    window.addEventListener("showToastr", function(event) {
        toastr.remove();
        if (event.detail.type === 'info') {
            toastr.info(event.detail.message)
        } else if (event.detail.type === 'success') {
            toastr.success(event.detail.message)
        } else if (event.detail.type === 'error') {
            toastr.error(event.detail.message)
        } else if (event.detail.type === 'warning') {
            toastr.warning(event.detail.message)
        } else {
            return false
        }
    })
</script>

</html>
