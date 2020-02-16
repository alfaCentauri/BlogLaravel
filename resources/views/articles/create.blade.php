@extends('base');
@section('title')
    Creando articulo
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-1 col-10 offset-1">
                <div class="row">
                    <div class="col-12 text-center text-capitalize">
                        <h1>Creando un art&iacute;culo.</h1>
                    </div>
                </div>
                <form method="POST" action="{{ asset('articleStore') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label class="col-form-label" for="title">Titulo del Articulo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input id="title" name="title" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="" for="content">Contenido:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea  id="content" name="content" class="form-control" rows="4" cols="60" maxlength="255"
                                placeholder="Indique un contenido."></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <select id="category" name="category" class="form-control">
                                <option value="Noticias">Noticias</option>
                                <option value="Noticias ultima hora">Noticias ultima hora</option>
                                <option value="Deportes">Deportes</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="submit" name="aceptar" value="Aceptar" class="btn btn-block btn-primary">
                        </div>
                        <div class="col-6">
                            <input type="reset" name="cancelar" value="Cancelar" class="btn btn-block btn-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
