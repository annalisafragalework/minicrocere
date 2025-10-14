@extends('admin.master')

@section('content')
<div class="container">
    <h2>Dettaglio Paziente</h2>

    <p><strong>Nome:</strong> {{ $paziente->name }}</p>
    <p><strong>Email:</strong> {{ $paziente->email }}</p>
    <p><strong>Ruoli:</strong> {{ $paziente->roles->pluck('name')->join(', ') }}</p>

    <a href="{{ route('admin.dottori.editpaziente', $paziente->id) }}" class="btn btn-warning">Modifica</a>
    <a href="{{ route('admin.dottori.indexpazienti') }}" class="btn btn-secondary">Torna alla lista</a>
</div>
@endsection
