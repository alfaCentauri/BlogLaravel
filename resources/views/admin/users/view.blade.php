@extends('admin.dashboard');
@section('title')
    Listado de usuarios.
@endsection
@push('cssPropios')
    <!--load all styles of icons -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }} >
@endpush
@section('content')
    <h2 class="text-center text-black-50">
        Usuarios del Sistema.
    </h2>
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Crear Usuario</a>
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
                            <span class="fa fa-stop" aria-hidden="true">u</span>
                        </a>
                        <a href="{{ route('users.destroy', $user->id)  }}" onclick="alert('¿Esta seguro de eliminarlo?');"
                           class="align-items-center btn btn-sm btn-warning">
                            <span class="fas fa-remove" aria-hidden="true">x</span>
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
