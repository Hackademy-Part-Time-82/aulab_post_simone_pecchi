<header class="masthead">

    {{-- BARRA SUPERIORE --}}
    <div class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="topbar-date">
                {{ ucfirst(now()->locale('it')->translatedFormat('l j F Y')) }}
            </span>

            <div class="d-flex align-items-center gap-3">
                @auth
                    <span class="d-none d-sm-inline">Ciao, {{ Auth::user()->name }}</span>
                    @if (Route::has('logout'))
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="topbar-link btn btn-link p-0">Esci</button>
                        </form>
                    @endif
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="topbar-link">Accedi</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-sm btn-subscribe">Registrati</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    {{-- TESTATA --}}

    @if (request()->routeIs('homepage'))
        <div class="container text-center py-3 py-md-4">
            <a href="{{ route('homepage') }}" class="brand">The Aulab Post</a>
            <p class="brand-tagline mb-0">Notizie verificate, ogni giorno</p>
        </div>
    @endif

    {{-- BARRA CATEGORIE --}}
    <nav class="navbar navbar-expand-lg category-bar" data-bs-theme="dark">
        <div class="container">
            @if (request()->routeIs('homepage'))
                <span class="navbar-brand d-lg-none brand-small">Sezioni</span>
            @else
                <a href="{{ route('homepage') }}" class="navbar-brand brand-inline">The Aulab Post</a>
            @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#categoryNav"
                aria-controls="categoryNav" aria-expanded="false" aria-label="Apri menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="categoryNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}"
                            href="{{ route('homepage') }}">Home</a>
                    </li>
                    {{-- categorie fisse --}}
                    <li class="nav-item"><a class="nav-link" href="{{ route('article.index') }}">tutti gli articoli</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Politica</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Economia</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Esteri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Tecnologia</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sport</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cultura</a></li>
                </ul>

                @auth
                    @if (Route::has('article.create'))
                        <a href="{{ route('article.create') }}" class="btn btn-sm btn-subscribe ms-lg-3 my-2 my-lg-0">
                            + Inserisci articolo
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

</header>
