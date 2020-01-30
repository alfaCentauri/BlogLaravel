@extends('base');
@section('title')
    Lista de articulos
@endsection
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
                    {{ $article->content }} <br><hr>
                    Fecha: {{ $article->created_at }}
                </div>
                <div class="card-footer text-muted">
                    Autor: {{ $article->user->name }}
                </div>
            </div>
        @endforeach
    </div>
@endsection
