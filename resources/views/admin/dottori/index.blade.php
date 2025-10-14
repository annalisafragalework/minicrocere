@extends('admin.master')

@section('content')
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">Gestione dottori</h2>

        {{-- Messaggio di successo --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pulsante per creare nuovo utente --}}
        <a href="{{ route('admin.dottori.create') }}" class="btn btn-primary mb-3">Nuovo Utente</a>

        {{-- Tabella dottori --}}
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
                    @foreach($dottori as $dottore)
                        <tr>
                            <td>
                  <a href="{{ route('admin.dottori.pazienti.delDottore', ['dottore' => $dottore->id]) }}" class="text-decoration-none">
                                {{ $dottore->name }}
                            </a>

                            </td>
                            <td>{{ $dottore->email }}</td>
                            <td>{{ implode(', ', $dottore->getRoleNames()->toArray()) }}</td>
                            <td>
<a href="{{ route('admin.dottori.edit', $utente) }}" class="btn btn-sm btn-warning">
    Modifica
</a>

                                <form action="{{ route('admin.dottori.destroy', $dottore) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Eliminare questo utente?')"
                                        aria-label="Elimina {{ $dottore->name }}">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        {{-- Paginazione --}}
        <div class="d-flex justify-content-center">
            {{ $dottori->links() }}
        </div>
    </div>
</main>
@endsection
