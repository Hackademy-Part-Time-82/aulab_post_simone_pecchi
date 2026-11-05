@props(['requests', 'role'])

<table class="table table-hover align-middle requests-table">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col" class="text-end">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($requests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-end">
                    @switch($role)
                        @case('amministratore')
                            <form action="{{ route('admin.setAdmin', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-subscribe">Attiva {{ $role }}</button>
                            </form>
                            @break

                        @case('revisore')
                            <form action="{{ route('admin.setRevisor', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-subscribe">Attiva {{ $role }}</button>
                            </form>
                            @break

                        @case('redattore')
                            <form action="{{ route('admin.setWriter', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-subscribe">Attiva {{ $role }}</button>
                            </form>
                            @break
                    @endswitch
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-muted py-4">Nessuna richiesta per questo ruolo</td>
            </tr>
        @endforelse
    </tbody>
</table>