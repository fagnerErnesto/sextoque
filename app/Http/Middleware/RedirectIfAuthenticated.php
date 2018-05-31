<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    protected $strPatternLocale = '/pt([-_](br|BR))?/';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $this->changeLocale($request);

        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function changeLocale($request){
        if (preg_match($this->strPatternLocale, $request->server('HTTP_ACCEPT_LANGUAGE'))) {
            App::setLocale('pt-BR');
        }
    }
}
