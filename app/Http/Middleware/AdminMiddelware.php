<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check())
            if (count(Client::where("email", "=", "admin@admin.com")
                    ->where("client_id", "=", Auth::user()->client_id)->get()) > 0
            ) {
                return $next($request);
            } else {
                return redirect()->guest("/admin/login");
            }
        else
             return redirect()->guest("/admin/login");

    }
}
