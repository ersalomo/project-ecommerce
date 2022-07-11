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
    <link href="bootstrap/dist/libs/iJabo/ijabo.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('icon-buku.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/libs/ijaboCroptool/ijaboCroptool.min.css') }}">
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
    <script src="{{ asset('bootstrap/dist/libs/jQuery/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/iJabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/ijaboCroptool/ijaboCropTool.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="bootstrap/dist/js/tabler.min.js"></script>
    @stack('scripts')
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
</body>

</html>
