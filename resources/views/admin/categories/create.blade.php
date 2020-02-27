@extends('admin.dashboard');
@section('title')
    Creando una categoria
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize text-center">creando una categoria.</h1>
            </div>
        </div>
        @include('components.errors')
        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba un nombre', 'required']) !!}
        </div>
        <div class="row">
            <div class="col-6">
                {!! Form::submit('Aceptar', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
            <div class="col-6">
                {!! Form::reset('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
