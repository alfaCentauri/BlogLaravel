<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="HTML, CSS, XML, JavaScript, Laravel, Framework, PHP">
        <meta name="description" content="Ejemplo de Laravel 6">
        <meta name="author" content="Ricardo Presilla">
        <title>@yield('title', 'Blog con Laravel')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link href="{{ asset('css/blog.css') }}" rel="stylesheet">
    @stack('cssPropios')
    <!-- JS -->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/holder.min.js') }}"></script>
        <script src="{{ asset('js/conversor.js') }}"></script>
        @stack('scripts')
    </head>
    <body>
        <div class="container">
            <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <a class="text-muted" href="{{ route('register') }}">Registrarse</a>
                    </div>
                    <div class="col-4 text-center">
                        <a class="blog-header-logo text-dark" href="{{ route('bienvenida') }}">Laravel 6</a>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a class="text-muted" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                        </a>
                        @auth
                            <a href="{{ route('users.index') }}">Dashboard</a>
                        @else
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Login</a>
                        @endauth
                    </div>
                </div>
            </header>
            <!-- Menu -->
        @include('publico.menu')
        <!-- Fin Menu -->
            <!-- Banner -->
        @yield('banner', 'Banner estático')
        <!-- Fin Banner -->
        @yield('postCard')
        </div>
        <main role="main" class="container">
            <div class="row">
            @yield('articulos', 'Listado de  artículos')
                <!-- Buttons of Pagination --
                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Anteriores</a>
                        <a class="btn btn-outline-secondary disabled" href="#">Nuevos</a>
                    </nav>
                    !-- End Buttons of Pagination -->
            <!-- Aside -->
            @include('publico.aside')
            <!-- End Aside -->
            </div><!-- /.row -->
        </main><!-- /.container -->
        @include('publico.pie')
        <script>
            Holder.addTheme('thumb', {
                bg: '#55595c',
                fg: '#eceeef',
                text: 'Thumbnail'
            });
        </script>
    </body>
</html>
