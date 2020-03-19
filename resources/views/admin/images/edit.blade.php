@extends('admin.dashboard')
@section('title')
    Modificando la Im&aacute;gen: {{ $image->name }}
@endsection
@section('content')
    <div class="container mb-3">
        @include('components.errors')
        {!! Form::open(['route' => ['images.update', $image], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
            <div class="card mt-3 mb-3">
                <div class="card-header">
                    <div class="card-title">
                        Modificando una Im&aacute;gen de la galer&iacute;a
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('img/articles/'.$image->name) }}" alt="{{ $image->name }}" class="img-thumbnail">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombreAnterior">Archivo anterior: </label>
                                <input type="text" class="form-control-plaintext" readonly="true" value="{{ $image->name }}">
                            </div>
                            <div class="form-group">
                                {!! Form::label('imagen', 'Nuevo Archivo de Imagen:') !!}
                                {!! Form::file('imagen', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
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
