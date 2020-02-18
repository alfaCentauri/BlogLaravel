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
        <form method="POST" action="{{ route('articleStore') }}">
            @csrf
            <div class="form-group">
                <label class="col-form-label" for="title">T&iacute;tulo del Art&iacute;culo</label>
                <input id="title" name="title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label class="" for="texto">Contenido:</label>
                <textarea  id="texto" name="texto" class="form-control" rows="4" cols="60"
                           maxlength="255" placeholder="Indique un contenido."></textarea>
            </div>
            <div class="form-group">
                <label class="" for="texto">Categor&iacute;a:</label>
                <select id="category_id" name="category_id" class="form-control">
                    <option value="1">Noticias</option>
                    <option value="2">Noticias de &uacute;ltima hora</option>
                    <option value="3">Ecolog&iacute;a</option>
                    <option value="4">Sucesos</option>
                    <option value="5">Deportes</option>
                </select>
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
@endsection
