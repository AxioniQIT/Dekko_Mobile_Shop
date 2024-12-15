<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd($request->user()->role);

        // check logged user type and redirect to the specific page
        if ($request->user()->role === 'Admin') {
            return redirect()->route('admin.dashboard');
        }
        if ($request->user()->role === 'Superadmin') {
            return redirect()->route('superadmin.dashboard');
        }
        if ($request->user()->role === 'Employee') {
            return redirect()->route('employee.dashboard');
        }

    }
}
