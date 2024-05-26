<html><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>Aqua Store</title>

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
<body class="light-skin fixed-navbar sidebar-scroll">

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            Aqua Store
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">AquaStor APP</span>
        </div>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="login.html">Login</a>
                    </li>
                    <li>
                        <a class="" href="login.html">Logout</a>
                    </li>
                    <li>
                        <a class="" href="profile.html">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li class="dropdown">
                    <a href="{{ route('logout') }}">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div id="navigation" style="overflow: hidden; width: auto; height: 100%;">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route('home') }}"> <span class="nav-label"> <i class="fa fa-home text-danger"></i> Dashboard</span></a>
            </li>
            <li>
                <a href="{{ route('clientes.index') }}"> <i class="fa fa-user text-success"></i> Clientes</a>
            </li>
            <li>
                <a href="{{ route('produtos.index') }}"> <i class="fa fa-tag text-warning"></i> Produtos</a>
            </li>
            <li>
                <a href="{{ route('produtos.index') }}"> <i class="fa fa-shopping-cart text-info"></i> Vendas</a>
            </li>
        </ul>
    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 0px; position: absolute; top: 0px; opacity: 0.3; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 316.469px;"></div><div class="slimScrollRail" style="width: 0px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="normalheader ">
        <div class="hpanel">
            <div class="panel-body">
                <a class="small-header-action" href="">
                    <div class="clip-header">
                        <i class="fa fa-arrow-up"></i>
                    </div>
                </a>
                <h2 class="font-light m-b-xs">
                    {{ session('tela_atual') ?? 'Dashboard' }}
                </h2>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            Example text
        </span>
        Company 2015-2020
    </footer>

</div>

<!-- Vendor scripts -->
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

<!-- App scripts -->
<script src="{{ url('scripts/homer.js') }}"></script>
<script src="{{ url('scripts/charts.js') }}"></script>
@livewireScripts

<script>
    function validateNumberInput(input) {
        input.value = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    }

    function maskReal(input) {
        let value = input.value;
        value = value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
        value = (value / 100).toFixed(2) + ""; // Divide por 100 para obter o valor correto
        value = value.replace(".", ","); // Substitui o ponto por vírgula
        input.value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."); // Adiciona pontos a cada 3 dígitos
    }

    $(document).on('click', '.btn-excluir', function() {
        return confirm('Deseja realmente excluir este registro?');
    });
</script>
</body>
</html>
