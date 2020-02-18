<!-- Alertas -->
<div class="card">
    <div class="card-header text-center text-danger">
        {{ $title }}
    </div>
    <div class="card-body text-justify">
        <h5 class="card-title">Atención:</h5>
        <p class="card-text">{{ $slot }}</p>
    </div>
</div>
