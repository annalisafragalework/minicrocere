 
 

{{--Il contenuto qui sotto riempirà lo @yield('content') nel tuo file master --}}
@section('content')
<div class="container">
    <h2 class="mb-4">Nuovo Utente</h2>

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

    {{-- Form --}}
    <form action="{{ route('admin.utenti.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
      
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Crea Utente</button>
        <a href="{{ route('admin.utenti.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
</div>
 