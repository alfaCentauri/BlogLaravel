@extends('base')
@section('title')
    Art&iacute;culos de {{ $nameTag }}
@endsection
@section('banner')
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark" id="banner">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">{{ $nameTag }}</h1>
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
