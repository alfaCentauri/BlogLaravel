@if(count($errors)>0)
    <div class="card text-white bg-danger mb-3">
        <div class="card-header">
            <h3 class="card-title">Error</h3>
        </div>
        <div class="card-body text-justify">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="card-text">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
