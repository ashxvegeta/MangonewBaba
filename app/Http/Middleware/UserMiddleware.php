<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = session('user');

        if ($user && $user->role === 'user') {
            return $next($request);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You must be logged in to add items to the cart.'
            ], 401);
        }

        return redirect('/signin');
    }
}
