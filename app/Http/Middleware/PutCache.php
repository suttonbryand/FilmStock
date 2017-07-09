<?php

namespace FilmStock\Http\Middleware;
use Illuminate\Support\Facades\Cache;

use Closure;

class PutCache extends AbstractCache
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
        $response = $next($request);
        $key = AbstractCache::makeCacheKey($request->url());
        if(!Cache::has($key)) Cache::put($key, $response->getContent(), 360);
        return $response;
    }
}
