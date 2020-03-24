@foreach($articles as $article)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{ $article->category->name }}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="#">{{ $article->title }}</a>
                </h3>
                <div class="mb-1 text-muted">
                    <script>
                        document.write(formatearFecha("{{ $article->created_at }}"));
                    </script>
                </div>
{{--                <p class="card-text mb-auto">--}}
{{--                    @if( strlen($article->content) >= 60 )--}}
{{--                        {{ substr($article->content, 0, 60) }} ...--}}
{{--                        <script>--}}
{{--                            document.write( htmlToString("{{ $article->content }}") );--}}
{{--                        </script>--}}
{{--                    @else--}}
{{--                        {{ $article->content }}--}}
{{--                    @endif--}}
{{--                </p>--}}
                <a href="{{ route('articleShow', $article->id) }}">Continue leyendo</a>
            </div>
            @if( count($article->images) < 1)
                <img src="{{ asset('img/articles/manzana.jpg') }}" class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="{{ $article->title }}">
            @else
                @foreach($article->images as $image)
                    <img src="{{ asset('img/articles/'.$image->name) }}" class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="{{ $article->title }}">
                @endforeach
            @endif
        </div>
    </div>
@endforeach
