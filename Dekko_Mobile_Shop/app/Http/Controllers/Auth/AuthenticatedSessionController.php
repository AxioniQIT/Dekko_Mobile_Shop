<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        if ($request->email) {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                // Handle the case where the user is not found
                return redirect()->back()->withErrors(['Invalid email or password']);
            }

            if ($user->role === 'Admin') {
                $request->authenticate();
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Login Successful');
            } elseif ($user->role === 'Superadmin') {
                $request->authenticate();
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->intended(route('superadmin.dashboard'))->with('success', 'Login Successful');
            } elseif ($user->role === 'Employee') {
                $request->authenticate();
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->intended(route('employee.dashboard'))->with('success', 'Login Successful');
            } else {
                // Handle the case where the user's role is not recognized
                return redirect()->back()->withErrors(['Invalid user role']);
            }
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
