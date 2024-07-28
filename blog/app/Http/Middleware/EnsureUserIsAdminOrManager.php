<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdminOrManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (Auth::check()) {
            $registered_user = User::with('roles')->find(Auth::user()->id);
            foreach ($registered_user->roles as $role) {
                if ("admin" == $role->name) {
                    return $next($request);
                }
            }
        }
        return redirect(to:'/login');
    }
}
