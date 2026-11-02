<x-c-layout>
    <div class="container my-5">

        <span class="article-show-category">Articoli di</span>
        <h1 class="section-title mb-4">{{ $user->name }}</h1>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-3">
                    <x-c-article-card :article="$article" :show-author="false" />
                </div>
            @empty
                <p class="text-muted">Questo redattore non ha ancora pubblicato articoli.</p>
            @endforelse
        </div>

        <div class="mt-5">
            <a href="{{ route('article.index') }}" class="btn btn-outline-dark">← Tutti gli articoli</a>
        </div>

    </div>
</x-c-layout>