<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // This controller is only for admins
        if (Auth::user()->role !== 'Admin') {
            abort(404);
        }
    }

    public function index()
    {
        return view('admin.dashboard');
    }

}
