<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

    <script src="{{ asset('assets/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('assets/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/toastr.min.js') }}"></script>
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        const API_TOKEN = '{{ session("api_token") }}';
    </script>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --light-bg: #f8f9ff;
            --card-bg: #ffffff;
            --text-dark: #1a1a2e;
            --text-light: #6c757d;
            --border-color: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .layout-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .layout-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styling */
        .navbar {
            background: var(--primary-gradient) !important;
            box-shadow: 0 2px 12px rgba(102, 126, 234, 0.15);
            border: none;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: -0.5px;
        }

        .navbar .form-control {
            background-color: rgba(255, 255, 255, 0.15) !important;
            border: 1px solid rgba(255, 255, 255, 0.25) !important;
            color: white !important;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .navbar .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .navbar .form-control:focus {
            background-color: rgba(255, 255, 255, 0.25) !important;
            border-color: rgba(255, 255, 255, 0.4) !important;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            z-index: 100;
            background: var(--card-bg);
            border-right: 1px solid var(--border-color);
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 3.5rem;
            }
        }

        .sidebar-sticky {
            padding-top: 1.5rem;
        }

        .sidebar .nav-link {
            color: var(--text-dark) !important;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
        }

        .sidebar .nav-link:hover {
            background-color: var(--light-bg);
            color: var(--primary-color) !important;
            transform: translateX(4px);
        }

        .sidebar .nav-link.active {
            background: var(--primary-gradient);
            color: white !important;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .sidebar .nav-link i {
            font-size: 1.1rem;
            margin-right: 0.75rem;
        }

        .sidebar-heading {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar .link-light {
            color: var(--text-dark) !important;
        }

        /* DEFAULT (mobile / offcanvas) */
        .nav-inactive {
            color: #212529; /* text gelap */
        }

        /* Desktop sidebar */
        .sidebar .nav-inactive {
            color: rgba(255,255,255,.75);
        }

        .sidebar .nav-inactive:hover {
            color: #fff;
        }

        /* Active */
        .nav-link.active {
            font-weight: 600;
        }


        /* Offcanvas Sidebar */
        .offcanvas {
            background: var(--card-bg) !important;
        }

        .offcanvas-title {
            color: var(--text-dark);
            font-weight: 700;
        }

        /* footer */
        footer {
            background: wheat;
            text-align: center;
            padding: 1em;
            margin-top: auto;
        }

        /* Main Content */
        main {
            background-color: var(--light-bg);
        }

        main h1, main h2 {
            color: var(--text-dark);
            font-weight: 700;
        }

        .border-bottom {
            border-bottom: 1px solid var(--border-color) !important;
        }

        /* Buttons */
        .btn-outline-secondary {
            color: var(--primary-color);
            border-color: var(--border-color);
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background: var(--primary-gradient);
            border-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        /* Form Controls */
        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            background-color: var(--card-bg);
            color: var(--text-dark);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            background-color: var(--card-bg);
            color: var(--text-dark);
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-control::placeholder {
            color: var(--text-light);
        }

        /* Status Badges */
        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        /* Chart */
        canvas {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .sidebar {
                top: 5rem;
            }

            main {
                padding: 1rem;
            }
        }
    </style>
</head>
<body class="layout-wrapper">
    @include('partials.header')
    <div class="container-fluid layout-content">
        <div class="row">
            @include('partials.sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom bg-light subheader">
                    <h1 class="h3 px-4">@yield('title-content')</h1>
                    {{-- <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                        <button class="btn btn-sm btn-outline-secondary">Export</button>
                        <button class="btn btn-sm btn-outline-secondary">Share</button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle">This Week</button>
                    </div> --}}
                </div>

                @yield('content')
            </main>
        </div>
    </div>
    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.navbar-toggler');
            const sidebar = document.querySelector('.sidebar');

            if (toggleBtn && sidebar) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
        });
    </script>
</body>
</html>