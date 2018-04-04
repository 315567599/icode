<?php

$value = config('app.timezone');
//To set configuration values at runtime, pass an array to the config helper:

config(['app.timezone' => 'America/Chicago']);

//Middleware
namespace App\Http\Middleware;

use Closure;

class OldMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->input('age') <= 200) {
            return redirect('home');
        }

        return $next($request);
    }

}
