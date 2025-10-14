@extends('admin.master')

@section('content')
<div class="container">
    <h2>Modifica Paziente</h2>

    <form action="{{ route('admin.dottori.pazienti.update', $paziente->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $paziente->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $paziente->email) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection
