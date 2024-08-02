<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivityLog;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            UserActivityLog::create([
                'user_id' => Auth::id(),
                'path' => $request->path(),
                'method' => $request->method(),
                'ip_address' => $request->ip(),
            ]);
        }

        return $next($request);
    }
}

