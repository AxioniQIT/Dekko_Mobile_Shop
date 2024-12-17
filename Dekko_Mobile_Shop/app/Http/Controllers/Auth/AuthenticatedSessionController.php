<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

            if (!$user || !Hash::check($request->password, $user->password_hash)) {
                // Handle invalid email or password
                return redirect()->back()->withErrors(['Invalid email or password']);
            }

            // Authenticate and regenerate session
            Auth::login($user);
            $request->session()->regenerate();

            // Redirect based on role
            if ($user->role === 'Admin') {
                return redirect()->intended(route('admin.dashboard'))->with('success', 'Login Successful');
            } elseif ($user->role === 'Superadmin') {
                return redirect()->intended(route('superadmin.dashboard'))->with('success', 'Login Successful');
            } elseif ($user->role === 'Employee') {
                return redirect()->intended(route('employee.dashboard'))->with('success', 'Login Successful');
            } else {
                // Handle invalid role
                return redirect()->back()->withErrors(['Invalid user role']);
            }
        }

        // Default fallback
        return redirect()->back()->withErrors(['Invalid email or password']);

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
