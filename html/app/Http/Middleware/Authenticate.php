<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\CustomerController;

class Authenticate extends CustomerController
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $guard = $this->auth($request);
        
        $statusCode = (int) $guard->getStatusCode();

        if ($statusCode === 401) {
            return response()->json(['status' => 'Unauthorized.'],$statusCode);
        }

        return $next($request);
    }
}
