<x-c-layout>
    <div class="container my-5">

        <h1 class="page-heading">Bentornato, Revisore {{ Auth::user()->name }}</h1>

        @if (session('message'))
            <div class="alert alert-success text-center">{{ session('message') }}</div>
        @endif

        <div class="row g-5">
            <div class="col-12">
                <h2 class="section-title mb-3">Articoli da revisionare</h2>
                <x-c-articles-table :articles="$unrevisionedArticles" />
            </div>

            <div class="col-12">
                <h2 class="section-title mb-3">Articoli pubblicati</h2>
                <x-c-articles-table :articles="$acceptedArticles" />
            </div>

            <div class="col-12">
                <h2 class="section-title mb-3">Articoli respinti</h2>
                <x-c-articles-table :articles="$rejectedArticles" />
            </div>
        </div>

    </div>
</x-c-layout>