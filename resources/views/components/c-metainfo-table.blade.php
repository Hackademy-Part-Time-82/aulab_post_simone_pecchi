@props(['metaInfos', 'metaType'])

<table class="table table-hover align-middle requests-table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Articoli collegati</th>
            <th scope="col">Modifica</th>
            <th scope="col" class="text-end">Elimina</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>
                <td>{{ $metaInfo->name }}</td>
                <td>{{ $metaInfo->articles()->count() }}</td>

                @if ($metaType == 'tags')
                    <td>
                        <form action="{{ route('admin.editTag', $metaInfo) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" class="form-control form-control-sm"
                                placeholder="Nuovo nome">
                            <button type="submit" class="btn btn-sm btn-outline-dark">Aggiorna</button>
                        </form>
                    </td>
                    <td class="text-end">
                        <form action="{{ route('admin.deleteTag', $metaInfo) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                        </form>
                    </td>
                @else
                    <td>
                        <form action="{{ route('admin.editCategory', $metaInfo) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" class="form-control form-control-sm"
                                placeholder="Nuovo nome">
                            <button type="submit" class="btn btn-sm btn-outline-dark">Aggiorna</button>
                        </form>
                    </td>
                    <td class="text-end">
                        <form action="{{ route('admin.deleteCategory', $metaInfo) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                        </form>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4">Nessun elemento</td>
            </tr>
        @endforelse
    </tbody>
</table>
