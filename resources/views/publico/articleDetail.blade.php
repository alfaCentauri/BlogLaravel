<!-- blog post -->
@foreach($articles as $article)
<div class="blog-post">
    <h2 class="blog-post-title">{{ $article->title }}</h2>
    <p class="blog-post-meta">
        <script>
            document.write(formatearFecha("{{ $article->created_at }}"));
        </script> redactado por <a href="#">{{ $article->user->name }}</a></p>
    {!! $article->content !!}
</div>
@endforeach
<!-- /.blog-post -->
