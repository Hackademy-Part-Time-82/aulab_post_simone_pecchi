<x-c-layout>
    <div class="container my-5">
        <h1 class="page-heading">Risultati per "{{ $query }}"</h1>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-3">
                    <x-c-article-card :article="$article" />
                </div>
            @empty
                <p class="text-muted text-center">Nessun articolo trovato per "{{ $query }}".</p>
            @endforelse
        </div>
    </div>
</x-c-layout>