<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
 use Illuminate\Support\Str;
 use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use App\Models\User;

class PazienteController extends Controller
{
    // Lista pazienti di uno specifico dottore
    public function index(User $dottore)
    {  
   
            $pazienti = $dottore->patients()->with('roles')->paginate(10);
            return view('admin.dottori.pazienti.index', compact('dottore', 'pazienti'));
      
    }

    // Form per creare un nuovo paßziente
    public function create(User $dottore)
    {
        
        return view('admin.dottori.pazienti.create', compact('dottore'));
    }

    // Salvataggio nuovo paziente
 

public function store(Request $request, User $dottore)
{
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'fiscal_code' => ['required', 'string', 'size:16'], // CF italiano ha 16 caratteri
        'phone' => ['required', 'string', 'max:20'], // puoi aggiungere regex se vuoi validare il formato
        'email' => ['required', 'email', 'max:255'],
    ]);

    $password = Str::password(12); // oppure Str::random(10)

    $paziente = User::create([
        'name'  => $validated['name'],
        'lastname'  => $validated['lastname'],
        'fiscal_code'  => $validated['fiscal_code'],
        'phone'        => $validated['phone'],
        'email'       => $validated['email'],
        'password'    => bcrypt($password),
        'dottore_id'  => $dottore->id,
    ]);

    $paziente->assignRole('paziente');

    // Se vuoi mostrare la password generata:
    return redirect()->route('admin.dottori.pazienti.index', $dottore)
                     ->with('success', "Paziente creato con successo. Password: $password");
}

 
 

    // Form di modifica paziente
  public function edit(User $dottore, User $paziente)
{
    // Verifica se il paziente è associato al dottore
    if (!$paziente->doctors->contains($dottore->id)) {
        abort(403, 'Accesso non autorizzato');
    }

    return view('admin.dottori.pazienti.edit', compact('dottore', 'paziente'));
}

    // Aggiornamento paziente


public function update(Request $request, User $dottore, User $paziente)
{
    // Controllo di autorizzazione
    if (!$paziente->doctors->contains($dottore->id)) {
        abort(403, 'Accesso non autorizzato');
    }

    // Controllo manuale sul codice fiscale
    $fiscalCode = strtoupper($request->input('fiscal_code'));

if (strlen($fiscalCode) !== 16 || !preg_match('/^[A-Z0-9]{16}$/', $fiscalCode)) {
    $errors = new MessageBag([
        'fiscal_code' => ['Il codice fiscale deve contenere esattamente 16 caratteri alfanumerici.']
    ]);

  return redirect()
    ->route('admin.dottori.pazienti.edit', ['dottore' => $dottore->id, 'paziente' => $paziente->id])
    ->withErrors($errors)
    ->withInput();
}

    // Validazione Laravel
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'fiscal_code' => ['required', 'string'], // già validato sopra
        'phone' => [
            'required',
            'string',
            'max:20',
            'regex:/^\+?[0-9\s\-]{7,20}$/',
        ],
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('users')->ignore($paziente->id),
        ],
    ], [
        'phone.regex' => 'Il numero di telefono non è valido.',
        'email.unique' => 'Questa email è già associata a un altro utente.',
    ]);

    // Aggiornamento paziente
    $paziente->update($validated);

    // Redirect con messaggio
    return redirect()->route('admin.dottori.pazienti.index', ['dottore' => $dottore->id])
                     ->with('success', 'Paziente aggiornato con successo.');
}
  // Rotta personalizzata (opzionale)
    public function pazientiDelDottore(User $dottore)
    {
        return $this->index($dottore);
    }
}