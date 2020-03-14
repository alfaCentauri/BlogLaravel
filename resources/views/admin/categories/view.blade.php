@extends('admin.dashboard')
@section('title')
    Listado de categorias.
@endsection
@push('cssPropios')
    <!--load all styles of icons -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}" >
@endpush
    @section('content')
    <h2 class="text-center text-black-50">
        Listado de categorias.
    </h2>
    <div class="row">
        <div class="col-3">
            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success">Crear Categor&iacute;a</a>
        </div>
        <div class="offset-5 col-4">
            @component('components.search')
                {{ route('categories.index') }}
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
            @foreach( $categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="align-items-center btn btn-sm btn-danger">
                            <span class="fa fa-stop" aria-hidden="true">u</span>
                        </a>
                        <a href="{{ route('categories.destroy', $category->id)  }}" onclick="alert('¿Esta seguro de eliminarla?');"
                           class="align-items-center btn btn-sm btn-warning">
                            <span class="fas fa-remove" aria-hidden="true">x</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            {!! $categories->render() !!}
        </div>
    </div>
    @endsection
