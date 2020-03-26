@extends('admin.dashboard')
@section('title')
    {{ $article->title }}
@endsection
@push('scripts')
    <!-- Listas de selección -->
    <script src="{{ asset('js/conversor.js') }}"></script>
@endpush
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
            <ul class="list-inline">
                @foreach( $article->tags as $tag)
                    <li class="list-inline-item">
                        <a href="{{ route('searchTag', $tag->name) }}" class="card-subtitle text-muted">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
            {!! $article->content !!}<hr>
            Fecha: <script>
                document.write(formatearFecha("{{ $article->created_at }}"));
            </script>.
        </div>
        <div class="card-footer text-muted">
            Autor: {{ $article->user->name }}
        </div>
    </div>
@endsection
