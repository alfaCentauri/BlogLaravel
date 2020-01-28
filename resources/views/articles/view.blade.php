<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Lista de articulos</title>
</head>
<body>
@section('content')
    <div class="container">
        @foreach($articles as $article)
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
                    {{ $article->user->name }} |
                </div>
            </div>
        @endforeach
    </div>
    @endsection
</body>
</html>
