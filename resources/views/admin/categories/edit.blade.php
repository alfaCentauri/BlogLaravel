@extends('admin.dashboard');
@section('title')
    Modificando la categor&iacute;a: {{ $category->name }}.
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize text-center">Modificando la categor&iacute;a: {{ $category->name }}.</h1>
            </div>
        </div>
        @include('components.errors')
        {!! Form::open(['route' => ['categories.update', $category], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Escriba un nombre', 'required']) !!}
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
