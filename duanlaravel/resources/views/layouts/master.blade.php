<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quan ly ban han| @yield('title')</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet"/>
</head>

<body>
    <div class="container">
        <div class="row" id="h1">
            <div class="col-md-3">
                color
            </div>
            <div class="col-md-9">
                sflj
            </div>
        </div>
        <div class="row" id="h2">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                @yield('content');
            </div>
        </div>
        <div class="row" id="h3">
            <div class="col-md-12">
                dfgkjsf
            </div>
        </div>

    </div>




    <script src="{{ asset('vendor/popper/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.js') }}"></script>
</body>

</html>