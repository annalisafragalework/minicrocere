<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
 
class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'        => ['required', 'string', 'max:255'],
            'lastname'    => ['nullable', 'string', 'max:255'],
            'codefiscal'  => ['nullable', 'string', 'max:50'],
            'vat_number'  => ['nullable', 'string', 'max:50'],
            'phone'       => ['nullable', 'string', 'max:30'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
// Mostra il form di registrazione
public function create()
{
    return view('auth.register');
}
    /**
     * Create a new user instance after a valid registration.
     */
protected function createUser(array $data)
{
        return User::create([
            'name'        => $data['name'],
            'lastname'    => $data['lastname'] ?? null,
            'codefiscal'  => $data['codefiscal'] ?? null,
            'vat_number'  => $data['vat_number'] ?? null,
            'phone'       => $data['phone'] ?? null,
            'email'       => $data['email'],
            'password'    => Hash::make($data['password']),
        ]);
    }
public function register(Request $request)
{
    $this->validator($request->all())->validate();

    $user = $this->createUser($request->all());

    event(new Registered($user));

    $this->guard()->login($user);

    return redirect($this->redirectPath());
}


public function store(Request $request)
{
    $validated = $request->validate([
        'name'        => 'required|string|max:255',
        'lastname'    => 'nullable|string|max:255',
        'codefiscal'  => 'nullable|string|max:50',
        'vat_number'  => 'nullable|string|max:50',
        'phone'       => 'nullable|string|max:30',
        'email'       => 'required|email|unique:users,email',
        'password'    => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'name'        => $validated['name'],
        'lastname'    => $validated['lastname'] ?? null,
        'codefiscal'  => $validated['codefiscal'] ?? null,
        'vat_number'  => $validated['vat_number'] ?? null,
        'phone'       => $validated['phone'] ?? null,
        'email'       => $validated['email'],
        'password'    => Hash::make($validated['password']),
    ]);

    $user->assignRole('dottore'); // o 'dottore', se serve

    return redirect()->route('login')->with('success', 'Utente creato con successo');
}



}
