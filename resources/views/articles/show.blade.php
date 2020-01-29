<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $article->title }}</title>
</head>
<body>
    <div class="container">
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">
                    {{ $article->title }}
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $article->category->name }}</h5>
                @foreach( $article->tags as $tag)
                    <h6 class="card-subtitle text-muted">{{ $tag->name }}</h6>
                @endforeach
            </div>
            <img src="{{ asset('img/articles/imagen1.png') }}" alt="Imagen Articulo" class="img-responsive">
            <div class="card-body">
                {{ $article->content }} <br>
                Fecha: {{ $article->created_at }}
            </div>
            <div class="card-footer text-muted">
                Autor: {{ $article->user->name }}
            </div>
        </div>
    </div>
</body>
</html>
