<x-c-layout>

     <div class="container mt-4">
        @if (session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        @if (session('alert'))
            <div class="alert alert-danger text-center">
                {{ session('alert') }}
            </div>
        @endif
    </div>

    <div class="container my-5">
        <h2 class="section-title mb-4">Ultime notizie</h2>

    <div class="row g-4">
        @forelse ($articles as $article)
            <div class="col-12 col-md-6 col-lg-3">
                <x-c-article-card :article="$article" />
            </div>
        @empty
            <p class="text-muted">Nessun articolo pubblicato.</p>
        @endforelse
    </div>
</div>

    
</x-c-layout>