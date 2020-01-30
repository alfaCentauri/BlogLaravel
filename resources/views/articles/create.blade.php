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
                    <label class="" for="title">Titulo del Articulo</label>
                    <input id="title" name="title" type="text" class="form-control">
                    <label class="" for="content">Contenido:</label>
                    <input id="content" type="textarea" class="form-control">
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

@endsection
