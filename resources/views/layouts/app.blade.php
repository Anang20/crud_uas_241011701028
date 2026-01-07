<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <!-- JS -->
    <script src="{{ asset('assets/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('assets/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/toastr.min.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const API_TOKEN = '{{ session("api_token") }}';
    </script>
</head>
<body class="layout-wrapper">

    @include('partials.header')

    <div class="container-fluid layout-content">
        <div class="row">
            @include('partials.sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-4">
                    <h1 class="h3">@yield('title-content')</h1>
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    @include('partials.footer')

</body>
</html>
