<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestCounterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $numOfRequest = $request->session()->get('number_of_requests', 0);
        $numOfRequest = session('number_of_requests', 0);

        $numOfRequest += 1;

        // $request->session()->put'number_of_requests', $numOfRequest);
        session([
            'number_of_requests' => $numOfRequest
        ]);

        return $next($request);
    }
}
