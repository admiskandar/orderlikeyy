<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserTypeMiddleware
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        $userType = $request->user()->user_type;

        if (!in_array($userType, $types)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
