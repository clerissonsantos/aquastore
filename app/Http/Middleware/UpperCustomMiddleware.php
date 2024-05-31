<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UpperCustomMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        foreach ($request->all() as $key => $value) {
            if ($key === 'password' || $key === '_token') {
                continue;
            }

            if (is_string($value))
                $request->merge([$key => strtoupper($value)]);
        }

        return $next($request);
    }
}
