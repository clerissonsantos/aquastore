<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Loja Fácil App</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ url('vendor/fontawesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/metisMenu/dist/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/animate.css/animate.css') }}">
    <link rel="stylesheet" href="{{ url('vendor/bootstrap/dist/css/bootstrap.css') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ url('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ url('fonts/pe-icon-7-stroke/css/helper.css') }}">
    <link rel="stylesheet" href="{{ url('styles/style.css') }}">
    @livewireStyles

    <script src="{{ url('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ url('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('vendor/jquery-flot/jquery.flot.js') }}"></script>
    <script src="{{ url('vendor/jquery-flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('vendor/jquery-flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('vendor/flot.curvedlines/curvedLines.js') }}"></script>
    <script src="{{ url('vendor/jquery.flot.spline/index.js') }}"></script>
    <script src="{{ url('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
    <script src="{{ url('vendor/iCheck/icheck.min.js') }}"></script>
    <script src="{{ url('vendor/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('vendor/sparkline/index.js') }}"></script>

    <script src="{{ url('scripts/homer.js') }}"></script>
    <script src="{{ url('scripts/charts.js') }}"></script>
    @livewireScripts


    <style>
        body {
            color: #4ac8dc !important;
        }
        .bg-dark {
            background-color: rgb(1,32,52) !important;
        }

        .bg-dark-medio {
            background-color: rgb(1,52,87) !important;
        }
    </style>
</head>
<body class="blank bg-dark">

<div class="login-container bg-dark">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <img src="/images/logo-novo.png" height="300" width="300">
                <h3>Faça o login para ter acesso</h3>
                <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
            <div class="hpanel bg-dark-medio">
                <div class="panel-body bg-dark-medio" style="border: none;">
                    <form method="post" id="loginForm" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label" for="username">Email</label>
                            <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="username" class="form-control">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Senha</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <button class="btn btn-success btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>AquaStore</strong>
        </div>
    </div>
</div>
</body>
</html>
