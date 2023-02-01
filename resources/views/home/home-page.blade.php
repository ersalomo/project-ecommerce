<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('icon-buku.png') }}" type="image/x-icon" />
    <link href="{{ asset('bootstrap/dist/libs/iJabo/ijabo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bootstrap/dist/libs/ijaboCroptool/ijaboCroptool.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('bootstrap/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bootstrap/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bootstrap/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bootstrap/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bootstrap/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @livewireStyles
    <style>
        * {
            font-family: Nunito;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    @include('home.inc.navbar')
    @if (!request()->is('user-profile'))
        <header class="bg-dark py-1 mb-2 hidden-this-for-profile">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Welcome to website E-Shooping simple portfolio </p>
                </div>
            </div>
        </header>
    @endif

    <!-- Section-->
    @yield('content')
    <!-- Footer-->
    @include('home/inc/footer')
    @livewireScripts
    <script src="{{ asset('bootstrap/dist/libs/jQuery/jquery.js') }}"></script>
    {{-- <script src="{{ asset('bootstrap/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('bootstrap/dist/js/demo.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('bootstrap/dist/libs/iJabo/ijabo.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/ijaboCroptool/ijaboCropTool.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/libs/ijaboViewer/jquery.ijaboViewer.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/tabler.min.js') }}"></script>
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
