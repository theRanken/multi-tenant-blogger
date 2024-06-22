<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExtractSubdomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost(); // Get the full host (e.g., subdomain.example.com)
        $subdomain = explode('.', $host)[0]; // Assuming the first segment is the subdomain

        // Store the subdomain in the request object
        $request->attributes->set('subdomain', $subdomain);

        // Alternatively, you can store it in the session or a global variable
        // session(['subdomain' => $subdomain]);

        return $next($request);
    }
}
