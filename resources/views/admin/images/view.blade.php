@extends('admin.dashboard')
@section('title')
    Galer&iacute;a de Im&aacute;genes
@endsection
@push('cssPropios')

@endpush
@push('scripts')

@endpush
@section('content')
    <h2 class="text-center text-black-50">
        Galer&iacute;a de Im&aacute;genes:
    </h2>
    <div class="row mb-1">
        <div class="col-3">

        </div>
        <div class="offset-5 col-4">
            @component('components.search')
                {{ route('images.index') }}
            @endcomponent
        </div>
    </div>
    <div class="row">
        @include('admin.images.imagesCard')
    </div>
    <div class="row">
        <div class="offset-4 col-md-4">
            {!! $images->render() !!}
        </div>
    </div>
@endsection
