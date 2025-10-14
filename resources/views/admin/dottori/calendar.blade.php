@extends('admin.master')

@section('content')


    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2>Inserisci disponibilità mensile</h2>
        <form method="POST" action="{{ route('appointments.generate-slots') }}">
            @csrf
            <input type="hidden" name="doctor_id" value="{{ auth()->id() }}">
            <label for="date">Data:</label>
            <input type="date" name="date" required>

            <label for="start_hour">Ora inizio:</label>
            <input type="time" name="start_hour" required>

            <label for="end_hour">Ora fine:</label>
            <input type="time" name="end_hour" required>

            <label for="slot_duration">Durata slot (minuti):</label>
            <input type="number" name="slot_duration" value="30" min="5" required>

            <button type="submit" class="btn btn-primary mt-3">Genera Slot</button>
        </form>
        <h3 class="mt-5">Slot già generati</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Ora Inizio</th>
                    <th>Ora Fine</th>
                    <th>Paziente</th>
                </tr>
            </thead>
            <tbody> 
                @forelse($slots as $slot)
                    <tr>
                        <td>{{ $slot->date }}</td>
                        <td>{{ $slot->start_time }}</td>
                        <td>{{ $slot->end_time }}</td>
                        <td>   
                            
                            @if($slot->paziente)
                                {{ $slot->paziente->name }}
                            @else
                                <em>Disponibile</em>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Nessuno slot disponibile</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
<form method="POST" action="{{ route('appointments.delete-past-slots') }}">
    @csrf
    <button type="submit" class="btn btn-danger mt-3">Elimina slot passati non prenotati</button>
</form>

    </div>
@endsection