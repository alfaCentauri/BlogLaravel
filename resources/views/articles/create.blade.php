@extends('admin.dashboard');
@section('title')
    Creando art&iacute;culo
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-capitalize">
                <h1>Creando un art&iacute;culo.</h1>
            </div>
        </div>
        @include('components.errors')
        {!! Form::open(['route' => 'articleStore', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Título del Artículo:') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Escriba un título', 'required']) !!}
            </div>
        <div class="form-group">
            {!! Form::label('content', 'Contenido:') !!}
            {!! Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'Escriba un contenido', 'required']) !!}
        </div>
            <!--div-- class="form-group">
                <label class="" for="texto">Contenido:</label>
                <textarea  id="texto" name="texto" class="form-control" rows="4" cols="60"
                           maxlength="255" placeholder="Indique un contenido."></textarea>
            </div-->
        <div class="form-group">
            {!! Form::model($categories, []) !!}
            {!! Form::close() !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Categoría:') !!}
            <select class="form-control" name="item_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
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
