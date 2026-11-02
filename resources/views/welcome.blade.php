<x-c-layout>

    @if (session("message"))
    
        <div class="alert alert-success">
            {{ session("message") }}
        </div>
        
    @endif

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