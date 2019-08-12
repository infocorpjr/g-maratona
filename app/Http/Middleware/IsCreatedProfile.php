<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsCreatedProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->create_profile){
            return $next($request);
        }
        $request->session()->flash('unsuccessful', 'Favor criar um perfil válido para acessar o recurso');
        return redirect()->route('profile.index');
    }
}
