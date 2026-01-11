<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOfficeTime
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if (!$user) {
            return redirect('/login')->with('error', 'Please login first');
        }

        $currentHour = now()->format('H'); // 0 - 23
        if ($currentHour < 9 || $currentHour >= 17) {
            return response('⛔ Access closed. Office time is 9 AM to 5 PM.', 403);
        }

        // ✅ If logged in and within time, allow access
        return $next($request);
    }
}
