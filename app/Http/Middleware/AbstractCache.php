<?php

namespace FilmStock\Http\Middleware;
use Illuminate\Support\Facades\Cache;

use Closure;

class AbstractCache
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
        return $next($request);
    }

    protected static function makeCacheKey($url){
        return 'route_' . str_slug($url);
    }
}
