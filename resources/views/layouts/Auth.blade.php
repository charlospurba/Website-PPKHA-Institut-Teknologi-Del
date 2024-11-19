<!DOCTYPE html>
<html>

<head>
    <title>PPKHA IT Del</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
        }

        .card-header,
        .card-body {
            text-align: center;
        }

        .btn-primary {
            width: 100%;
        }

        .form-check-label {
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/vendor/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
