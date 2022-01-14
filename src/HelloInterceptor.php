<?php

namespace EntraSolutions\Helloworld;

use Closure;
use Illuminate\Http\Request;


class HelloInterceptor
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
        $response = $next($request);
        
        $response->mixin( new HelloworldResponseInjector() );

        $response->dohelloStuff();
        
        return $response;
    }
}
