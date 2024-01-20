<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecureSLRD
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {

        if($this->validateAccessToken($request) == true){
            return $next($request);
        }else{
           return response('Not allowed to access : Un-authorized');
        }

        
    }

    private function validateAccessToken($request)
    {

        if (isset($request->header()['x-api-key'])) {

            $accessToken = env('SLRD_API_ACCESS_KEY');

            if ($request->header('x-api-key') === $accessToken) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
