@props(['article', 'showCategory' => true, 'showAuthor' => true])

<div class="card article-card h-100">
    <a href="{{ route('article.show', $article) }}">
        <img src="{{ Storage::url($article->image) }}" class="card-img-top article-card-img" alt="{{ $article->title }}">
    </a>

    <div class="card-body d-flex flex-column">
        @if ($showCategory)
            @if ($article->category)
                <a href="{{ route('article.byCategory', $article->category) }}"
                    class="article-card-category text-decoration-none">
                    {{ $article->category->name }}
                </a>
            @else
                <span class="article-card-category text-muted">Senza categoria</span>
            @endif
        @endif

        <h5 class="card-title article-card-title mt-2">
            <a href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
        </h5>

        <p class="card-text article-card-subtitle">{{ $article->subtitle }}</p>

        @if ($article->tags->isNotEmpty())
            <div class="mb-2">
                @foreach ($article->tags as $tag)
                    <span class="tag-chip">#{{ $tag->name }}</span>
                @endforeach
            </div>
        @endif

        <div class="article-card-meta mt-auto">
            @if ($showAuthor)
                Di <a href="{{ route('article.byUser', $article->user) }}"
                    class="text-dark fw-bold text-decoration-none">{{ $article->user->name }}</a> ·
            @endif
            {{ $article->created_at->format('d/m/Y') }} · {{ $article->readDuration() }} min di lettura
        </div>

        <a href="{{ route('article.show', $article) }}" class="btn btn-outline-dark btn-sm mt-3">Leggi l'articolo</a>
    </div>
</div>
