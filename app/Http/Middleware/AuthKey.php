<?php

namespace App\Http\Middleware;

use Closure;
use Response;
use Illuminate\Http\Request;

class AuthKey {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        $token = request()->bearerToken();
        if ($token !== config('app.jwt_token')) {
            return Response::json([
                'message' => 'Access denited. Not Valid JWT Token.'
            ], 401);
        }
        return $next($request);
    }

}
