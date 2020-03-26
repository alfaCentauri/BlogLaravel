@extends('base')
@section('title')
    Art&iacute;culos de Tecnolog&iacute;a
@endsection
@section('banner')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark" id="banner">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Blog creado en Laravel 6</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continuar leyendo...</a></p>
        </div>
    </div>
@endsection
@section('articulos')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Listado de art&iacute;culos
        </h3>
    @include('publico.articleDetail')
    {!! $articles->render() !!}
    </div><!-- /.blog-main -->
@endsection
