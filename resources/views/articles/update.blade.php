@extends('base');
@section('title')
    Modificacndo un art&iacute;culo
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-capitalize">
                <h1>Modificando un art&iacute;culo.</h1>
            </div>
        </div>
        <form method="POST" action="{{ route('articleStore') }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <label class="col-form-label" for="title">T&iacute;tulo del Art&iacute;culo</label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input id="title" name="title" type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="" for="texto">Contenido:</label>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <textarea  id="texto" name="texto" class="form-control" rows="4" cols="60"
                               maxlength="255" placeholder="Indique un contenido."></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="1">Noticias</option>
                        <option value="2">Noticias de &uacute;ltima hora</option>
                        <option value="3">Ecolog&iacute;a</option>
                        <option value="4">Deportes</option>
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
        @component('alert')
            <strong>Whoops!</strong> Something went wrong!
        @endcomponent
    </div>
@endsection
