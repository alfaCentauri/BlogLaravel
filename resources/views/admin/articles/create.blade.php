@extends('admin.dashboard')
@section('title')
    Creando art&iacute;culo
@endsection
@push('cssPropios')
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trumbowyg.css') }}">
@endpush
@push('scripts')
    <!-- Listas de selección -->
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/chosen.jquery.js') }}"></script>
    <!-- Editor de texto -->
    <script src="{{ asset('js/trumbowyg.js') }}"></script>
    <script src="{{ asset('js/trumbowyg_es.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#category_id").select2({
                language: "es",
            });
            $(".chosen-select").chosen({
                placeholder_text_multiple: "Seleccione una o más opciones",
                no_results_text: "Oops, no hay datos!",
            });
            $('textarea').trumbowyg({
                lang: 'es',
                btns: ['strong', 'em', 'del']
            });
        });
    </script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-capitalize">
                <h1>Creando un art&iacute;culo.</h1>
            </div>
        </div>
        @include('components.errors')
        {!! Form::open(['route' => 'articleStore', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Título del Artículo:') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Escriba un título', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Categoría:') !!}
                <select class="form-control select2-choice" name="category_id" id="category_id" required="required" data-placeholder="...">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('texto', 'Contenido:') !!}
                {!! Form::textarea('texto', null, ['class' => 'form-control', 'placeholder' => 'Escriba un contenido', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tags[]', 'Etiquetas:') !!}
                {!! Form::select('tags[]', $tags, null, ['class' => 'form-control chosen-select', 'multiple', 'required',
                    'data-placeholder'=> "..."]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('imagen', 'Archivo de Imagen:') !!}
                {!! Form::file('imagen', null, ['class' => 'form-control', 'required']) !!}
            </div>
        <div class="row">
            <div class="col-6">
                {!! Form::submit('Agregar artículo', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
            <div class="col-6">
                {!! Form::reset('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
