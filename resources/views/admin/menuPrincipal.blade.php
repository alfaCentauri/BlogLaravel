<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('home') }}">Company name</a>
    @auth
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ route('logout') }}">Salir</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>
    @endauth
    <!--ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            @if (Route::has('logout'))
                @auth
                    <a class="nav-link" href="{{ route('logout') }}">Salir</a>
                @endauth
            @endif
        </li>
    </ul-->
</nav>
