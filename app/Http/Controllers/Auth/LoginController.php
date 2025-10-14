<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
 
        // Recupera il ruolo principale (puoi definire priorità se ne ha più di uno)
        $ruoloPrincipale = $user->roles()->orderBy('id')->first(); // oppure per nome
 
        // Salva il nome del ruolo in sessione
        Session::put('user_role', $ruoloPrincipale->name ?? 'guest');
        Session::put('user_id', $user->id);

        // Redirect alla dashboard
        return redirect()->intended(route('admin.index'));
    }

    return back()->withErrors([
        'email' => 'Credenziali non valide.',
    ]);
}

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

 
