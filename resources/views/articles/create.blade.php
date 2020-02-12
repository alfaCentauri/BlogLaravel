@extends('base');
@section('title')
    Creando articulo
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h1>Creando un art&iacute;culo.</h1>
                <form method="POST" action="">
                    @csrf
                    <label class="col-form-label" for="title">Titulo del Articulo</label>
                    <input id="title" name="title" type="text" class="form-control">
                    <label class="" for="content">Contenido:</label>
                    <textarea  id="content" name="content" class="form-control" rows="4" cols="60" maxlength="255"
                        placeholder="Indique un contenido."></textarea>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
@endsection
