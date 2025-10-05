 
 @extends('admin.master')

@section('content')
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">Gestione Utenti</h2>

        {{-- Messaggio di successo --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pulsante per creare nuovo utente --}}
        <a href="{{ route('admin.utenti.create') }}" class="btn btn-primary mb-3">Nuovo Utente</a>

        {{-- Tabella utenti --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ruoli</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($utenti as $utente)
                        <tr> 
                            <td>{{ $utente->name }}</td>
                            <td>{{ $utente->email }}</td>
                            <td>{{ implode(', ', $utente->getRoleNames()->toArray()) }}</td>
                            <td>
                     <a href="{{ route('admin.utenti.edit', $utente) }}" class="btn btn-sm btn-warning">Modifica</a>
                                <form action="{{ route('admin.utenti.destroy', $utente) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminare questo utente?')">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginazione --}}
        <div class="d-flex justify-content-center">
            {{ $utenti->links() }}
        </div>
    </div>
</main>
@endsection




 
