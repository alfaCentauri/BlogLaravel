<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('home') }}">Company name</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
            aria-expanded="false">
                {{ Auth::user()->name }}<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="nav-item text-nowrap">
                    @if (Route::has('login'))
                        @auth
                            <a class="nav-link" href="{{ route('logout') }}">Salir</a>
                        @endauth
                    @endif
                </li>
            </ul>
        </li>

    </ul>
</nav>
