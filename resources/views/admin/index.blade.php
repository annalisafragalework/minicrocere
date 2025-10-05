 
 @extends('admin.master')

{{--Il contenuto qui sotto riempirà lo @yield('content') nel tuo file master --}}
@section('content')
    
<main class="content-dashboard">
    <div class="container-fluid">
        @php 
       
            $ruoli = $user->getRoleNames()->toArray();
        @endphp

        @if(in_array('administrator', $ruoli))
            <h1>Benvenuto nel Pannello Amministratore!</h1>
            <p>Questa è la tua Dashboard iniziale. Inizia ad aggiungere i widget.</p>
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