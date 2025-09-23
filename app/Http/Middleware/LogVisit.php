<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('/')) {
            Visit::create([
                'user_id'   => Auth::id(),
                'ip_address' => $request->ip(),
                'user_agent' => substr($request->userAgent(), 0, 255),
                'path'      => $request->path(),
                'visited_at' => now(),
            ]);
        }
        return $next($request);
    }
}
