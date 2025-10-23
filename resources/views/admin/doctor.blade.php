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
        <a href="{{ route('admin.dottori.create') }}" class="btn btn-primary mb-3">Nuovo Dottore</a>

        {{-- Tabella dottori --}}
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Telefono</th>
                        <th>Email</th>
                      <th>Tipo Abbonamento</th>
                         <th>Free</th> 
                             <th>Operazioni</th> 
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
                                 <td>
                  
                                {{ $dottore->Cognome }}
                  
                            </td>  
                                <td>
                  
                                {{ $dottore->phone }}
                  
                            </td>  
                            <td>{{ $dottore->email }}</td>
                              <td>{{ $dottore->subscription_type }}</td>
                               <td>{{ $dottore->is_trial}}</td> 
                           <td>
                            <a href="{{ route('admin.dottori.edit', $dottore->id) }}" class="btn btn-sm btn-warning">
                                Modifica
                            </a>

                                <form action="{{ route('admin.dottori.destroy', $dottore) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Eliminare questo dottore?')"
                                        aria-label="Elimina {{ $dottore->name }}">Elimina</button>
                                </form>
                                 </td>  
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        {{-- Paginazione --}}
        <div class="d-flex justify-content-center">
           
        </div>
    </div>
</main>
@endsection
