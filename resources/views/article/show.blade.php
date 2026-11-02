<x-c-layout>
    <article class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

            

                {{-- titolo e sottotitolo --}}
                <h1 class="article-show-title mt-2">{{ $article->title }}</h1>
                <p class="article-show-subtitle">{{ $article->subtitle }}</p>


            {{-- immagine di copertina --}}
            <div class="col-12 col-lg-10 my-4">
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid w-100 article-show-img">
            </div>

            {{-- corpo del testo --}}
            <div class="col-12 col-lg-8">
                <div class="article-show-body">
                    {{$article->body}}
                </div>

                <div class="mt-5 pt-4 border-top">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-dark">← Torna a tutti gli articoli</a>
                </div>
            </div>
        </div>
    </article>
</x-c-layout>