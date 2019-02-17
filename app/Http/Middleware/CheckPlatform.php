<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;

class CheckPlatform
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
        $agent = new Agent();
        if ($agent->browser()) {
            $status = 400;

            $response = [
                'errors' => 'Sorry, you can use only for mobile.'
            ];
            return response($response,$status);

        }
        return $next($request);
    }
}
