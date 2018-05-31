<?php
/**
 * Created by PhpStorm.
 * User: fagner
 * Date: 30/12/17
 * Time: 17:32
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Bus\Dispatcher as BusDispatcher;

class App
{
    protected $bus;

    public function __construct(BusDispatcher $bus)
    {
        $this->bus = $bus;
    }

    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        }
        return $next($request);
    }
}