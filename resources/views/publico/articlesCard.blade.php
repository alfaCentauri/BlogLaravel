@foreach($articles as $article)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary">{{ $article->category->name }}</strong>
                <h3 class="mb-0">
                    <a class="text-dark" href="#">{{ $article->title }}</a>
                </h3>
                <div class="mb-1 text-muted">{{ $article->created_at }}</div>
                <p class="card-text mb-auto">{{ $article->content }}</p>
                <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="{{ $article->title }}">
        </div>
    </div>
@endforeach
<div class="row mb-2">
    <div class="offset-4 col-md-4">
        {!! $articles->render() !!}
    </div>
    <div class="col-md-4"></div>
</div>
