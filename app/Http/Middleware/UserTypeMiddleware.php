<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{

    public function handle(Request $request, Closure $next, string $userType): Response
    {
        if ($request->user()?->user_type == $userType) {
            return $next($request);
        }

        if ($request->expectsJson() || $request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'message' => 'You are not allowed to access this page.',
            ], 403);
        }

        return redirect()->route('home')->with('error', 'You are not allowed to access this page.');
    }
}
