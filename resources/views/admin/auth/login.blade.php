@extends('base')
@section('title')
    Login
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-capitalize text-center">Login</h1>
            </div>
        </div>
        @include('components.errors')
        <div class="row">
            <div class="offset-2 col-8 offset-2">
                {!! Form::open(['route' => 'auth.login', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Correo electrónico:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Escriba un email', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Contraseña:') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
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
        </div>
    </div>
@endsection
