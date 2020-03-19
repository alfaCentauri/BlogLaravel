@extends('admin.dashboard')
@section('title')
    Modificando art&iacute;culo: {{ $article->title }}.
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
                btns: [
                    ['viewHTML'],
                    ['undo', 'redo'], // Only supported in Blink browsers
                    ['formatting'],
                    ['strong', 'em', 'del'],
                    ['superscript', 'subscript'],
                    ['link'],
                    ['insertImage'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                    ['unorderedList', 'orderedList'],
                    ['horizontalRule'],
                    ['removeformat'],
                    ['fullscreen']
                ]
            });
        });
    </script>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-capitalize">
                <h1>Modificando el art&iacute;culo: {{ $article->title }}.</h1>
            </div>
        </div>
        @include('components.errors')
        {!! Form::open(['route' => ['articleUpdate', $article->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Título del Artículo:') !!}
            {!! Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Escriba un título', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Categoría:') !!}
            <select class="form-control select2-choice" name="category_id" id="category_id" required="required" data-placeholder="...">
                @foreach($categories as $category)
                    @if($article->category_id == $category->id)
                        <option value="{{ $article->category_id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('texto', 'Contenido:') !!}
            {!! Form::textarea('texto', $article->content, ['class' => 'form-control textarea-content', 'placeholder' => 'Escriba un contenido', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags[]', 'Etiquetas:') !!}
            {!! Form::select('tags[]', $tags, $my_tags, ['class' => 'form-control chosen-select', 'multiple', 'required',
                'data-placeholder'=> "..."]) !!}
        </div>
        <div class="row">
            <div class="col-6">
                {!! Form::submit('Actualizar artículo', ['class' => 'btn btn-primary btn-block']) !!}
            </div>
            <div class="col-6">
                {!! Form::reset('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
