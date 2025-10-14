@extends('admin.master')

@section('content')
<div class="container">
    <h2>Modifica Dottore</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dottori.update', $dottore) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $dottore->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $dottore->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salva modifiche</button>
        <a href="{{ route('admin.dottori.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
@endsection
