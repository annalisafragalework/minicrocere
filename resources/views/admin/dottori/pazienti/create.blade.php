
@extends('admin.master')

@section('content')
<div class="container">

    <h2>Nuovo Paziente</h2>
<form action="{{ route('admin.dottori.pazienti.store', ['dottore' => $dottore]) }}" method="POST">

        @csrf
        <div class="mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Salva</button>
    </form>
</div>
@endsection
