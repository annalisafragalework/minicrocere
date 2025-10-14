<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
 use Illuminate\Support\Str;
class UtenteController extends Controller
{
    // Lista pazienti di uno specifico dottore
    public function index(User $dottore)
    {
        $pazienti = $dottore->patients()->with('roles')->paginate(10);
        return view('admin.dottori.pazienti.index', compact('dottore', 'pazienti'));
    }

    // Form per creare un nuovo paziente
    public function create(User $dottore)
    {
        return view('admin.dottori.pazienti.create', compact('dottore'));
    }

    // Salvataggio nuovo paziente
 

public function store(Request $request, User $dottore)
{
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        // 'password' non richiesto nel form
    ]);

    $password = Str::password(12); // oppure Str::random(10)

    $paziente = User::create([
        'name'        => $validated['name'],
        'email'       => $validated['email'],
        'password'    => bcrypt($password),
        'dottore_id'  => $dottore->id,
    ]);

    $paziente->assignRole('paziente');

    // Se vuoi mostrare la password generata:
    return redirect()->route('admin.dottori.pazienti.index', $dottore)
                     ->with('success', "Paziente creato con successo. Password: $password");
}

 




// public function store(Request $request, User $dottore)
// {
//     $validated = $request->validate([
//         'name'     => 'required|string|max:255',
//         'email'    => 'required|email|unique:users,email',
//         'password' => 'required|string|min:6',
//     ]);

//     $paziente = User::create([
//         'name'        => $validated['name'],
//         'email'       => $validated['email'],
//         'password'    => bcrypt($validated['password']),
//         'dottore_id'  => $dottore->id,
//     ]);

//     $paziente->assignRole('paziente');

//     return redirect()->route('admin.dottori.pazienti.index', $dottore)
//                      ->with('success', 'Paziente creato con successo.');
// }   

    // Form di modifica paziente
    public function edit(User $dottore, User $paziente)
    {
          dd($dottore, $paziente);
        if ($paziente->dottore_id !== $dottore->id) {
            abort(403, 'Accesso non autorizzato');
        }

        return view('admin.dottori.pazienti.edit', compact('dottore', 'paziente'));
    }

    // Aggiornamento paziente
    public function update(Request $request, User $dottore, User $paziente)
    {
        if ($paziente->dottore_id !== $dottore->id) {
            abort(403, 'Accesso non autorizzato');
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $paziente->id,
        ]);

        $paziente->update($validated);

        return redirect()->route('admin.dottori.pazienti.index', $dottore)
                         ->with('success', 'Paziente aggiornato con successo.');
    }

    // Eliminazione paziente
    public function destroy(User $dottore, User $paziente)
    {
        if ($paziente->dottore_id !== $dottore->id) {
            abort(403, 'Accesso non autorizzato');
        }

        $paziente->delete();

        return redirect()->route('admin.dottori.pazienti.index', $dottore)
                         ->with('success', 'Paziente eliminato con successo.');
    }

    // Rotta personalizzata (opzionale)
    public function pazientiDelDottore(User $dottore)
    {
        return $this->index($dottore);
    }
}
