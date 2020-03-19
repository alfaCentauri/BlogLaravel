@foreach($images as $image)
    <div class="col-sm-4 col-md-3">
        <div class="card mb-3">
            <div class="card-header">
                <div class="card-title">
                    {{ $image->name }}
                </div>
            </div>
            <img src="{{ asset('img/articles/'.$image->name) }}" alt="{{ $image->name }}" class="img-thumbnail">
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('images.edit', $image) }}" class="btn btn-sm btn-info btn-block">
                            Editar
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('images.destroy', $image->id) }}" class="btn btn-sm btn-danger btn-block">
                            Eliminar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
