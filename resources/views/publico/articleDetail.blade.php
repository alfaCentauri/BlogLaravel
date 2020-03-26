<!-- blog post -->
@foreach($articles as $article)
<div class="blog-post">
    <h2 class="blog-post-title">{{ $article->title }}</h2>
    <p class="blog-post-meta">
        <script>
            document.write(formatearFecha("{{ $article->created_at }}"));
        </script> redactado por <a href="#">{{ $article->user->name }}</a></p>
    <p>Categor&iacute;a: <strong>{{ $article->category->name }}</strong> </p>
    {!! $article->content !!}
    <hr>
    <ul class="list-inline">
        @foreach($article->tags as $tag)
        <li class="list-inline-item">
            <a href="{{ route('searchTag', $tag->name) }}" class="text-info">{{ $tag->name }}</a>
        </li>
        @endforeach
    </ul>
    <hr>
</div>
@endforeach
<!-- /.blog-post -->
