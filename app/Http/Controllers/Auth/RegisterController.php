<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Dove reindirizzare dopo la registrazione.
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Mostra il form di registrazione.
     */
    public function create()
    {
           
        return view('auth.register');
    }

    /**
     * Validazione dei dati in ingresso.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'              => ['required', 'string', 'max:255'],
            'lastname'          => ['nullable', 'string', 'max:255'],
            'fiscal_code'        => ['nullable', 'string', 'max:50'],
            'vat_number'        => ['nullable', 'string', 'max:50'],
            'phone'             => ['nullable', 'string', 'max:30'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'subscription_id'   => ['nullable', 'string', 'max:255'],
            'subscription_type' => ['nullable', 'string', 'max:50'],
            'is_trial'          => ['nullable', 'boolean'],
        ]);
    }

    /**
     * Crea l'utente dopo registrazione valida.
     */
    protected function createUser(array $data)
    {
        return User::create([
            'name'              => $data['name'],
            'lastname'          => $data['lastname'] ?? null,
            'fiscal_code'        => $data['codefiscal'] ?? null,
            'vat_number'        => $data['vat_number'] ?? null,
            'phone'             => $data['phone'] ?? null,
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'subscription_id'   => $data['subscription_id'] ?? null,
            'subscription_type' => $data['subscription_type'] ?? null,
            'is_trial'          => $data['is_trial'] ?? 0,
        ]);
    }

    /**
     * Gestisce la registrazione POST.
     */
public function register(Request $request)
{
    dd( Auth::user()->isMonthly());
    // Validazione iniziale
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'is_trial' => ['nullable', 'boolean'],
        'subscription_id' => ['nullable', 'string'],
    ]);

    //  Verifica pagamento se non è prova gratuita
    if (!$request->boolean('is_trial') && empty($request->subscription_id)) {
        return redirect()->back()->withErrors([
            'subscription_id' => 'Pagamento non completato.',
        ])->withInput();
    }

    //  Creazione utente
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'subscription_id' => $request->subscription_id,
        'is_trial' => $request->boolean('is_trial'),
    ]);

    //  Assicurati che il ruolo esista
    Role::firstOrCreate(['name' => 'dottore']);

    //  Assegna ruolo "dottore" → aggiorna model_has_roles
    $user->assignRole('dottore');

    //  Evento di registrazione
    event(new Registered($user));

    // Redirect con messaggio
    return redirect()->route('login')->with('success', 'Registrazione completata. Ora puoi accedere.');
}
public function store(Request $request)
{
  
    // 1. VALIDAZIONE dei dati di registrazione (Essenziale!)
    // Usiamo 'validate' che gestisce automaticamente gli errori di reindirizzamento.
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'fiscal_code' => ['required', 'string', 'unique:users'],
        // Aggiungi qui tutte le regole di validazione per gli altri campi del form
    ]);
    
    // 2. CREAZIONE dell'Utente
    // La flag 'is_trial' viene impostata qui, utilizzando il valore '1' inviato dal form.
    $user = User::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'fiscal_code' => $request->fiscal_code,
        'vat_number' => $request->vat_number,
        'phone' => $request->phone,
        // Imposta lo stato di prova e la data di attivazione
        'is_trial' =>2, 
        // Assicurati che 'is_trial' e 'trial_activated_at' siano 'fillable' nel modello User
    ]);
   
DB::table('model_has_roles')->insert([
    'role_id' => 2, // ID del ruolo "medico"
    'model_type' => \App\Models\User::class,
    'model_id' => $user->id,
]);
    
    // 5. REDIREZIONE
    return redirect()->route('login') // o la tua dashboard
                     ->with('success', 'Registrazione completata! La tua prova gratuita è attiva.');
}
public function activateTrial(Request $request)
{
  
    // 1. VALIDAZIONE dei dati di registrazione (Essenziale!)
    // Usiamo 'validate' che gestisce automaticamente gli errori di reindirizzamento.
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'fiscal_code' => ['required', 'string', 'unique:users'],
        // Aggiungi qui tutte le regole di validazione per gli altri campi del form
    ]);
    
    // 2. CREAZIONE dell'Utente
    // La flag 'is_trial' viene impostata qui, utilizzando il valore '1' inviato dal form.
    $user = User::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'fiscal_code' => $request->fiscal_code,
        'vat_number' => $request->vat_number,
        'phone' => $request->phone,
        // Imposta lo stato di prova e la data di attivazione
        'is_trial' =>1, // O $request->is_trial se vuoi usare il valore dinamico del form
        'trial_activated_at' => now(), 
        // Assicurati che 'is_trial' e 'trial_activated_at' siano 'fillable' nel modello User
    ]);
   
DB::table('model_has_roles')->insert([
    'role_id' => 2, // ID del ruolo "medico"
    'model_type' => \App\Models\User::class,
    'model_id' => $user->id,
]);
    
    // 5. REDIREZIONE
    return redirect()->route('login') // o la tua dashboard
                     ->with('success', 'Registrazione completata! La tua prova gratuita è attiva.');
}

}
