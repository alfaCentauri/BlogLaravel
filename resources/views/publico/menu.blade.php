<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        @for($i=0; $i < sizeof($categories); $i++)
        <a class="p-2 text-muted" href="{{  $enlacesMenu[$i]  }}">{{ $categories[$i+1] }}</a>
        @endfor
    </nav>
</div>
