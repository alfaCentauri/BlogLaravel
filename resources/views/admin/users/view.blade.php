@extends('admin.dashboard')
@section('title')
    Listado de usuarios.
@endsection
@push('cssPropios')
    <!--load all styles of icons -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}" >
@endpush
@section('content')
    <h2 class="text-center text-black-50">
        Usuarios del Sistema.
    </h2>
    <div class="row">
        <div class="col-3">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Crear Usuario</a>
        </div>
        <div class="offset-5 col-4">
            @component('components.search')
                {{ route('users.index') }}
            @endcomponent
        </div>
    </div>
    <div class="table-responsive mt-1">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if( $user->type == "admin")
                        <span class="badge badge-primary">{{ $user->type }}</span>
                        @else
                        <span class="badge badge-secondary">{{ $user->type }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="align-items-center btn btn-sm btn-danger">
                            <svg class="bi bi-pencil" width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="{{ route('users.destroy', $user->id)  }}" onclick="alert('¿Esta seguro de eliminarlo?');"
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
            {!! $users->render() !!}
        </div>
    </div>
@endsection
