<?php

namespace Acme\Bunqpoly\Http\Middleware;

use Acme\Bunqpoly\Bunqpoly;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(Bunqpoly::class)->authorize($request) ? $next($request) : abort(403);
    }
}
