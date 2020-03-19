@extends('admin.dashboard')
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
    <div class="row">
        <div class="col-3">
            <a href="{{ route('articleCreate') }}" class="btn btn-sm btn-success">Crear Art&iacute;culo</a>
        </div>
        <div class="offset-5 col-4">
            @component('components.search')
                {{ route('articlesList') }}
            @endcomponent
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Indices</th>
                <th>Im&aacute;genes</th>
                <th>T&iacute;tulos</th>
                <th>Categor&iacute;as</th>
                <th>Creado por</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>
                        @if( count($article->images) < 1)
                            <img src="{{ asset('img/articles/manzana.jpg') }}" width="60" height="60" alt="Imagen Articulo" class="img-thumbnail">
                        @else
                            @foreach($article->images as $image)
                                <img src="{{ asset('img/articles/'.$image->name) }}" width="60" height="60" alt="{{ $image->name }}" class="img-thumbnail">
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->user->name }}</td>
                    <td>
                        <a href="{{ route('articleShow', $article->id) }}" class="align-items-center btn btn-sm btn-info">
                            <svg class="bi bi-pencil" width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="{{ route('articleEdit', $article->id) }}" class="align-items-center btn btn-sm btn-danger">
                            <svg class="bi bi-pencil" width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="{{ route('articleDelete', $article->id)  }}" onclick="alert('¿Esta seguro de eliminarlo?');"
                           class="align-items-center btn btn-sm btn-warning">
                            <svg class="bi bi-trash" width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $articles->render() !!}
        </div>
    </div>
@endsection
