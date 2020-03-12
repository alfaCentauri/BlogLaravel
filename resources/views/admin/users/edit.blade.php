@extends('admin.dashboard')
@section('title')
    Editar Usuario {{ $user->name }}.
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize text-center">Editar Usuario {{ $user->name }}.</h1>
            </div>
        </div>
        @include('components.errors')
        {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Escriba su nombre', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Tipo:') !!}
            {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], $user->type,
                ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione un tipo']); !!}
        </div>
        <div class="row">
            <div class="col-6">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
            <div class="col-6">
                {!! Form::reset('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
