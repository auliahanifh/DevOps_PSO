<?php

namespace App\Http\Middleware;

use Closure;
use Ensi\LaravelPrometheus\Prometheus;
use Illuminate\Support\Facades\Route;

class Telementary
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $startTime = microtime(true);
        $response = $next($request);
        $endTime = microtime(true);
        
        Prometheus::update('http_requests_count', 1, [Route::current()?->uri, $response->status()]);
        Prometheus::update('http_requests_duration_seconds', $endTime - $startTime);
        
        return $response;
    }
}
