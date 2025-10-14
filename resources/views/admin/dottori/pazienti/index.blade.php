@extends('admin.master')

@section('content')
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">
            Pazienti di {{ $dottore->name }}
        </h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.dottori.pazienti.create', ['dottore' => $dottore]) }}" class="btn btn-primary mb-3">
            Nuovo Paziente
        </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ruoli</th>
                    <th>Primario</th>
                    <th>Location</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pazienti as $paziente)
                    <tr>
                        <td>{{ $paziente->name }}</td>
                        <td>{{ $paziente->email }}</td>
                        <td>{{ $paziente->roles->pluck('name')->join(', ') }}</td>
                        <td>{{ $paziente->pivot->is_primary ? 'Sì' : 'No' }}</td>
                        <td>{{ $paziente->pivot->location }}</td>
                        <td>
                            <a href="{{ route('admin.dottori.pazienti.edit', ['dottore' => $dottore, 'paziente' => $paziente]) }}" class="btn btn-sm btn-warning">
                                Modifica
                            </a>

                            <form action="{{ route('admin.dottori.pazienti.destroy', ['dottore' => $dottore, 'paziente' => $paziente]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminare questo paziente?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $pazienti->links() }}
    </div>
</main>
@endsection
