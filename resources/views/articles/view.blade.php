@extends('admin.dashboard');
@section('title')
    Lista de Art&iacute;culos
@endsection
@push('cssPropios')
    <!-- Estilos para la seleccion de la lista-->
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap.css') }}">
@endpush
@push('scripts')
    <!-- Listas de selección -->
    <script src="{{ asset('js/select2.js') }}"></script>
@endpush
@section('content')
    <h2 class="text-center text-black-50">
        Lista de Art&iacute;culos.
    </h2>
    <a href="{{ route('articleCreate') }}" class="btn btn-sm btn-success">Crear Art&iacute;culo</a>
    <div class="row mt-2">
    @foreach($articles as $article)
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="card-title">
                        {{ $article->title }}
                    </div>
                </div>
                <img src="{{ asset('img/articles/manzana.jpg') }}" alt="Imagen Articulo" class="img-thumbnail">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->category->name }}</h5>
                    @foreach( $article->tags as $tag)
                        <h6 class="card-subtitle text-muted">{{ $tag->name }}</h6>
                    @endforeach
                    {{ $article->content }} <br><hr>
                    Fecha: {{ $article->created_at }}
                </div>
                <div class="card-footer text-muted">
                    Autor: {{ $article->user->name }}
                </div>
            </div>
        </div>
    @endforeach
        {!! $articles->render() !!}
    </div>
@endsection
