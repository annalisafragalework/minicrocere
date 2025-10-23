@extends('admin.master')

@section('content')
<div class="container">
    <h2>Modifica Paziente</h2>

    <form action="{{ route('admin.dottori.pazienti.update', ['dottore' => $dottore->id, 'paziente' => $paziente->id]) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $paziente->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lastname">Cognome</label>
            <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $paziente->lastname) }}" required>
            @error('lastname')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fiscal_code">Codice Fiscale</label>
            <input type="text" name="fiscal_code" class="form-control" value="{{ old('fiscal_code', $paziente->fiscal_code) }}" required>
            @error('fiscal_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $paziente->phone) }}" required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $paziente->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection
