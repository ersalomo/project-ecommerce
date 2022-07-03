<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/free-icons/shopping-cart">
    <!-- Bootstrap icons-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/js/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.css') }}"> --}}
    {{-- <script src="{{ asset('bootstrap/js/popup.js') }}"></script> --}}
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('bootstrap/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
    <header class="bg-dark py-1 mb-2 hidden-this-for-profile">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    @yield('content')
    <!-- Footer-->
    @include('home/inc/footer')
    @livewireScripts
</body>

</html>
