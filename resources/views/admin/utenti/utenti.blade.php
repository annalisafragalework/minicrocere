 @extends('admin.master')

{{--Il contenuto qui sotto riempirà lo @yield('content') nel tuo file master --}}
@section('content')
    
<main class="content-dashboard">
    <div class="container-fluid">
        @php 
            $ruoli = $user->getRoleNames()->toArray();
        @endphp

        @if(in_array('administrator', $ruoli))
            <h1>qui la tabella administretor utenti</h1>
       @extends('admin.layout')

@section('content')
<div class="container">
    <h2>Gestione Utenti</h2>

    <a href="{{ route('utenti.create') }}" class="btn btn-primary mb-3">Nuovo Utente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utenti as $utente)
            <tr>
                <td>{{ $utente->name }}</td>
                <td>{{ $utente->email }}</td>
                <td>
                    <a href="{{ route('utenti.edit', $utente) }}" class="btn btn-sm btn-warning">Modifica</a>
                    <form action="{{ route('utenti.destroy', $utente) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Eliminare questo utente?')">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $utenti->links() }}
</div>
@endsection






        @elseif(in_array('proprietario', $ruoli))
            <h1>Benvenuto nel Pannello Proprietario!</h1>
            <p>Questa è la tua Dashboard iniziale. Inizia ad aggiungere i widget.</p>
        @else
            <h1>Benvenuto!</h1>
            <p>Accesso base al sistema. Contatta l’amministratore per maggiori permessi.</p>
        @endif
    </div>
</main>

    
@endsection