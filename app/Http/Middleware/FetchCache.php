<?php

namespace FilmStock\Http\Middleware;
use Illuminate\Support\Facades\Cache;

use Closure;

class FetchCache extends AbstractCache
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
        $key = AbstractCache::makeCacheKey($request->url());
        if (Cache::has($key)) return (Cache::get($key));
        return $next($request);
    }
}
