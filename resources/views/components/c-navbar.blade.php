<header class="masthead">

    {{-- BARRA SUPERIORE --}}
    <div class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="topbar-date">
                {{ ucfirst(now()->locale('it')->translatedFormat('l j F Y')) }}
            </span>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('careers') }}" class="topbar-link">Lavora con noi</a>
                @auth
                    @if (Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="topbar-link">Dashboard Admin</a>
                    @endif
                    @if (Auth::user()->is_revisor)
                        <a href="{{ route('revisor.dashboard') }}" class="topbar-link">Dashboard Revisore</a>
                    @endif
                    @if (Auth::user()->is_writer && Route::has('writer.dashboard'))
                        <a href="{{ route('writer.dashboard') }}" class="topbar-link">I miei articoli</a>
                    @endif
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
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('article.index') ? 'active' : '' }}"
                            href="{{ route('article.index') }}">Tutti gli articoli</a>
                    </li>

                    {{-- Categorie dinamiche dal database --}}
                    {{-- Prime 5 categorie in barra --}}
                    @foreach ($categories->take(5) as $category)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('article.byCategory', $category) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                    {{-- Le altre nel menu "Altro" --}}
                    @if ($categories->count() > 5)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Altro
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                @foreach ($categories->skip(5) as $category)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('article.byCategory', $category) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>

                <form action="{{ route('article.search') }}" method="GET" class="d-flex my-2 my-lg-0 ms-lg-3"
                    role="search">
                    <input type="search" name="query" class="form-control form-control-sm"
                        placeholder="Cerca un articolo..." aria-label="Cerca">
                </form>

                @auth
                    @if (Auth::user()->is_writer)
                        <a href="{{ route('article.create') }}" class="btn btn-sm btn-subscribe ms-lg-3 my-2 my-lg-0">
                            + Inserisci articolo
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

</header>
