<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class UtenteController extends Controller
{
    public function index()
    {

        $utenti = User::paginate(10); // paginazione
        
        return view('admin.utenti.index', compact('utenti'));
    }

    public function create()
    {
        return view('admin.utenti.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('utenti.index')->with('success', 'Utente creato con successo.');
    }

public function edit(User $utente)
{
    $ruoliDisponibili = Role::pluck('name')->toArray();

    return view('admin.utenti.edit', compact('utente', 'ruoliDisponibili'));
}


public function update(Request $request, User $utente)
{
    // Validazione dei dati
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $utente->id,
        'ruoli' => 'nullable|array', // opzionale, se non selezioni nulla
        'ruoli.*' => 'string|exists:roles,name', // ogni ruolo deve esistere
    ]);

    // Aggiorna nome ed email
    $utente->update([
        'name'  => $validated['name'],
        'email' => $validated['email'],
    ]);

    // Sincronizza i ruoli (se presenti)
    if (isset($validated['ruoli'])) {
        $utente->syncRoles($validated['ruoli']);
    } else {
        $utente->syncRoles([]); // rimuove tutti i ruoli se nessuno selezionato
    }

    // Redirect con messaggio
    return redirect()->route('admin.utenti.index')
                     ->with('success', 'Utente aggiornato con successo.');
}
    public function destroy(User $utente)
    {
        $utente->delete();
        return redirect()->route('admin.utenti.index')->with('success', 'Utente eliminato.');
    }
 
}
