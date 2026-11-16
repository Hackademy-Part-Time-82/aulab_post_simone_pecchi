@props(['articles'])

<table class="table table-hover align-middle requests-table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tag</th>
            <th scope="col">Data</th>
            <th scope="col" class="text-end">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name ?? 'Senza categoria' }}</td>
                <td>
                    @foreach ($article->tags as $tag)
                        <span class="tag-chip">#{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                <td class="text-end">
                    <div class="d-inline-flex gap-2">
                        <a href="{{ route('article.show', $article) }}" class="btn btn-sm btn-outline-dark">Leggi</a>

                        <a href="{{ route('article.edit', $article) }}"
                            class="btn btn-sm btn-outline-secondary">Modifica</a>
                        <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center text-muted py-4">Nessun articolo</td>
            </tr>
        @endforelse
    </tbody>
</table>
