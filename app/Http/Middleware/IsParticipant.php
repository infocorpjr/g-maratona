<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsParticipant
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
        $acesso = Auth::user()->actor()->get()[0]->is_participant;
        $acesso = $acesso || Auth::user()->actor()->get()[0]->is_administrator;
        if ($acesso) {
            return $next($request);
        }
        return abort(403);
    }
}
