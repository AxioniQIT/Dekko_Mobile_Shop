<?php

namespace App\Http\Controllers\SuperAdmin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function __construct()
    {
        // This controller is only for Superadmins
        if (Auth::user()->role !== 'Superadmin') {
            abort(404);
        }
    }

    public function index()
    {
        // Get all users
        $users = User::all();
        return view('superadmin.user.viewusers', compact('users'));
    }

    public function create()
    {
        return view('superadmin.user.adduser');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'phone_number' => 'nullable|string|regex:/^[0-9]{10}$/',
            'address' => 'nullable|string',
            'role' => 'required|string|in:Superadmin,Admin,Employee',
            'password' => 'required|string',
        ]);

        DB::beginTransaction();

        try {

            // Create a new user
            $user = User::create([
                'username' => $validatedData['username'],
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
                'role' => $validatedData['role'],
                'password_hash' => $validatedData['password'],
                'password' => bcrypt($validatedData['password']), // bcrypt the password directly
            ]);

            // Commit the transaction
            DB::commit();
            return redirect()->route('superadmin.users')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(User $user)
    {
        return view('superadmin.user.edituser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'phone_number' => 'nullable|string|regex:/^[0-9]{10}$/',
            'address' => 'nullable|string',
            'role' => 'required|string|in:Superadmin,Admin,Employee',
            'password' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {

            $user->update([
                'username' => $validatedData['username'],
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
                'role' => $validatedData['role'],
                'password_hash' => bcrypt($validatedData['password'] ?? $user->password),
                'password' => $validatedData['password'] ?? bcrypt($validatedData['password']), // bcrypt the password directly
            ]);

            // Commit the transaction
            DB::commit();
            return redirect()->route('superadmin.users')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('superadmin.users')->with('success', 'User deleted successfully.');
    }

}
