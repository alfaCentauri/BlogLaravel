@extends('admin.dashboard')
@section('title')
    {{ $article->title }}
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="card-title">
                {{ $article->title }}
            </div>
        </div>
        @if( count($article->images) < 1)
            <img src="{{ asset('img/articles/manzana.jpg') }}" alt="Imagen Articulo" class="img-thumbnail">
        @else
            @foreach($article->images as $image)
                <img src="{{ asset('img/articles/'.$image->name) }}" alt="{{ $image->name }}" class="img-thumbnail">
            @endforeach
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $article->category->name }}</h5>
            <ul class="list-group list-group-flush">
                @foreach( $article->tags as $tag)
                    <li class="list-group-item">
                        <a href="" class="card-subtitle text-muted">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
            {!! $article->content !!} <br><hr>
            Fecha: {{ $article->created_at }}
        </div>
        <div class="card-footer text-muted">
            Autor: {{ $article->user->name }}
        </div>
    </div>
@endsection
