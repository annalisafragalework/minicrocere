<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $roleId)
    {
        $user = Auth::user();

        if (!$user || !$user->roles->contains('id', $roleId)) {
            abort(403, 'Accesso negato');
        }

        return $next($request);
    }
}
