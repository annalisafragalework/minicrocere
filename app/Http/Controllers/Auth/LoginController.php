<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Usa il nome della rotta definito: 'admin.dashboard'
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


// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// class LoginController extends Controller
// {
//     use AuthenticatesUsers;

//     /**
//      * Redirect users after login based on their role.
//      *
//      * @return string
//      */

//      public function __construct()
//     {
//         $this->middleware('guest')->except('logout');
//         $this->middleware('auth')->only('logout');
//     }

// protected function redirectTo()
// {
//     $user = Auth::user();
//     if (!$user) {
//         return '/login'; // Fallback di sicurezza
//     }
    
//     // Chiama il metodo che restituisce la stringa del ruolo con priorità più alta
//     $roleName = $user->getHighestRoleName(); 
 
//     // Reindirizzamento basato sulla stringa del ruolo
//     if ($roleName === 'administrator') {
//         return '/admin'; 
//     }

//     else if ($roleName === 'proprietario') {
//         return '/proprietario'; 
//     }

// }

// }
