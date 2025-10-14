<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PazienteController extends Controller
{
    public function index()
    {
        // Solo dottori con ruolo ID = 2 (pazienti)
        $pazienti = User::whereHas('roles', fn($q) => $q->where('id', 2))
                        ->with('roles')
                        ->paginate(10);

        return view('pazienti.index', compact('pazienti'));
    }

    public function show(User $paziente)
    {
        return view('pazienti.show', compact('paziente'));
    }

    public function edit(User $paziente)
    {
        return view('pazienti.edit', compact('paziente'));
    }

    public function update(Request $request, User $paziente)
    {
        $paziente->update($request->only(['name', 'email']));
        return redirect()->route('admin.pazienti.index')->with('success', 'Paziente aggiornato');
    }

    public function destroy(User $paziente)
    {
        $paziente->delete();
        return redirect()->route('admin.pazienti.index')->with('success', 'Paziente eliminato');
    }

    public function create()
    {
        return view('pazienti.create');
    }

    public function store(Request $request)
    {
        $paziente = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password123'), // oppure da input
        ]);

        $paziente->assignRole(2); // assegna ruolo paziente

        return redirect()->route('admin.pazienti.index')->with('success', 'Paziente creato');
    }
}
