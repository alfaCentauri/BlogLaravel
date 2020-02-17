@extends('base');
@section('title')
    Creando usuario
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize text-center">creando un usuario.</h1>
            </div>
        </div>
    {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba su nombre', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Clave:') !!}
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type', 'Tipo:') !!}
            {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null,
                ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione un tipo']); !!}
        </div>
        <div class="row">
            <div class="col-6">
            {!! Form::submit('OK', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
            <div class="col-6">
            {!! Form::reset('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
            </div>
        </div>
    {!! Form::close() !!}
    </div>
@endsection
