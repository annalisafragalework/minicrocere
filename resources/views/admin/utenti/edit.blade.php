@extends('admin.master')

@section('content')
<main class="content-dashboard">
    <div class="container-fluid">
        <h2 class="mb-4">Modifica Utente</h2>

        {{-- Messaggi di errore --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $errore)
                        <li>{{ $errore }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form di modifica --}}
        <form action="{{ route('admin.utenti.update', $utente) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $utente->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $utente->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="ruoli" class="form-label">Ruoli</label>
                <select name="ruoli[]" id="ruoli" class="form-select" multiple>
                    @foreach($ruoliDisponibili as $ruolo)
                        <option value="{{ $ruolo }}" {{ in_array($ruolo, $utente->getRoleNames()->toArray()) ? 'selected' : '' }}>
                            {{ ucfirst($ruolo) }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Tieni premuto Ctrl (Cmd su Mac) per selezioni multiple</small>
            </div>

            <button type="submit" class="btn btn-success">Aggiorna Utente</button>
            <a href="{{ route('admin.utenti.index') }}" class="btn btn-secondary ms-2">Annulla</a>
        </form>
    </div>
</main>
@endsection
