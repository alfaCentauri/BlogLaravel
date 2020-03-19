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
                    <a class="blog-header-logo text-dark" href="#">Laravel 6</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                    </a>
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
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
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
            </div>
        </div>
        <!-- Fin Banner -->
        <!-- Sección post card -->
        <div class="row mb-2">
            @include('publico.articlesCard')
        </div>
    </div>
    <!-- Fin Sección post card -->
    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Listado de art&iacute;culos
                </h3>
                @include('publico.articleDetail')
                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Anteriores</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Nuevos</a>
                </nav>
            </div><!-- /.blog-main -->

            <aside class="col-md-4 blog-sidebar">
                <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">Acerca de</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>
                <!-- Menu archivos -->
                @include('publico.menuArchivos')
                <!-- Fin Menu archivos -->
                <div class="p-3">
                    <h4 class="font-italic">En otra parte</h4>
                    <ol class="list-unstyled">
                        <li><a href="https://github.com/alfaCentauri">GitHub</a></li>
                        <li><a href="#">Linkedin</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->
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
