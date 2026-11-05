@props(['articles'])

<table class="table table-hover align-middle requests-table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
            <th scope="col" class="text-end">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->user->name }}</td>
                <td class="text-end">
                    @if (is_null($article->is_accepted))
                        <a href="{{ route('article.show', $article) }}" class="btn btn-sm btn-subscribe">Leggi
                            l'articolo</a>
                    @else
                        <form action="{{ route('revisor.undoArticle', $article) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-dark">Riporta in revisione</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4">Nessun articolo</td>
            </tr>
        @endforelse
    </tbody>
</table>
