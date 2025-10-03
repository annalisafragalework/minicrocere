<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class CheckRoleAndModule
{
    public function handle(Request $request, Closure $next, $role, $module)
    {
        $user = Auth::user();

        if (!$user || !$user->hasRoleInModule($role, $module)) {
            abort(403, 'Accesso negato');
        }

        return $next($request);
    }
}
