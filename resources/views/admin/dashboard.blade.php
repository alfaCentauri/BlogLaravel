<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="HTML, CSS, XML, JavaScript, Laravel, Framework, PHP">
        <meta name="description" content="Ejemplo de Laravel 6">
        <meta name="author" content="Ricardo Presilla">
        <meta name="theme-color" content="#563d7c">
        <title>@yield('title', 'Bienvenido')</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @stack('cssPropios')
    <!-- JS -->
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('js/feather.min.js') }}"></script>
        <!-- script src="{{ asset('js/dashboard.js') }}"></script -->
    @stack('scripts')
    <!-- Estilos base -->
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Grafica -->
        <style type="text/css">/* Chart.js */
            @-webkit-keyframes chartjs-render-animation{
                from{opacity:0.99}to{opacity:1}
            }
            @keyframes chartjs-render-animation{
                from{opacity:0.99}to{opacity:1}
            }
            .chartjs-render-monitor{
                -webkit-animation:chartjs-render-animation 0.001s;
                animation:chartjs-render-animation 0.001s;
            }
        </style>
        <!-- Estilos personalizados -->
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    </head>
    <body>
    @include('admin.menuPrincipal')
        <div class="container-fluid">
            <div class="row">
                @include('admin.menuVertical')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @include('flash::message')
                    @yield('content')
                </main>
            </div>
        </div>
    @include('admin.pie')
    </body>
</html>
