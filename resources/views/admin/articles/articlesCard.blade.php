<div class="row mt-2">
    @foreach($articles as $article)
        <div class="col-sm-4">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="card-title">
                        {{ $article->title }}
                    </div>
                </div>
                @if( count($article->images) < 1)
                    <img src="{{ asset('img/articles/manzana.jpg') }}" alt="Imagen Articulo" class="img-thumbnail">
                @else
                    @foreach($article->images as $image)
                        <img src="{{ asset('img/articles/'.$image->name) }}" alt="{{ $image->name }}" class="img-thumbnail">
                    @endforeach
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $article->category->name }}</h5>
                    <ul class="list-group list-group-flush">
                        @foreach( $article->tags as $tag)
                            <li class="list-group-item">
                                <a href="" class="card-subtitle text-muted">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    @if( strlen($article->content) >= 60 )
                        {{ substr($article->content, 0, 60) }}
                        <a href="{{ route('articleShow', $article->id) }}" class="text-decoration-none text-justify text-info">
                            <svg class="bi bi-chevron-right" width="32" height="32" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
                        </a>
                    @else
                        {{ $article->content }}
                    @endif
                    <br><hr>
                    Fecha: {{ $article->created_at }}
                </div>
                <div class="card-footer text-muted">
                    Autor: {{ $article->user->name }}
                </div>
            </div>
        </div>
    @endforeach
    <div class="text-center">
        {!! $articles->render() !!}
    </div>
</div>
