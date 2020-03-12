@extends('admin.dashboard')
@section('title')
    Listado de Etiquetas.
@endsection
@push('cssPropios')
    <!--load all styles of icons -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }} >
@endpush
    @section('content')
        <h2 class="text-center text-black-50" >
            Listado de Etiquetas.
        </h2>
    <div class="row">
        <div class="col-3">
            <a href="{{ route('tags.create') }}" class="btn btn-sm btn-success">Crear Etiqueta</a>
        </div>
        <div class="offset-5 col-4">
        @component('components.search')
            {{ route('tags.index') }}
        @endcomponent
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <a href="{{ route('tags.edit', $tag->id) }}" class="align-items-center btn btn-sm btn-danger">
                            <span class="fa fa-stop" aria-hidden="true">u</span>
                        </a>
                        <a href="{{ route('tags.destroy', $tag->id)  }}" onclick="alert('¿Esta seguro de eliminarla?');"
                           class="align-items-center btn btn-sm btn-warning">
                            <span class="fas fa-remove" aria-hidden="true">x</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $tags->render() !!}
        </div>
    </div>
    @endsection
