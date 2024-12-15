<?php

namespace App\Http\Controllers\SuperAdmin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
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
        return view('superadmin.dashboard');
    }
}
