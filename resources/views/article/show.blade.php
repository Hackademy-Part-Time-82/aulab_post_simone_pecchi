<x-c-layout>
    <article class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                {{-- Categoria --}}
                @if ($article->category)
                    <a href="{{ route('article.byCategory', $article->category) }}" class="article-show-category">
                        {{ $article->category->name }}
                    </a>
                @else
                    <span class="article-show-category text-muted">Senza categoria</span>
                @endif

                {{-- Titolo e sottotitolo --}}
                <h1 class="article-show-title mt-2">{{ $article->title }}</h1>
                <p class="article-show-subtitle">{{ $article->subtitle }}</p>

                {{-- Autore e data --}}
                <div class="article-show-meta">
                    Di
                    <a
                    href="{{ route('article.byUser', $article->user) }}"><strong>{{ $article->user->name }}</strong></a>
                    · {{ $article->created_at->format('d/m/Y') }}
                    · {{ $article->readDuration() }} min di lettura
                </div>

                {{-- Immagine di copertina --}}
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                    class="img-fluid w-100 article-show-img my-4">

                {{-- Corpo del testo --}}
                <div class="article-show-body">
                    {!! nl2br(e($article->body)) !!}
                </div>
                @if (Auth::user() && Auth::user()->is_revisor && is_null($article->is_accepted))
                    <div class="d-flex gap-3 my-5 p-4 border-top border-bottom">
                        <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Accetta articolo</button>
                        </form>
                        <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Rifiuta articolo</button>
                        </form>
                    </div>
                @endif
                @if ($article->tags->isNotEmpty())
                    <div class="mt-4">
                        @foreach ($article->tags as $tag)
                            <span class="tag-chip">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif

                <div class="mt-5 pt-4 border-top">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-dark">← Torna a tutti gli
                        articoli</a>
                </div>

            </div>
        </div>
    </article>
</x-c-layout>
