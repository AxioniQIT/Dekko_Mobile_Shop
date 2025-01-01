<?php

namespace App\Http\Controllers\Employee;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        // This controller is only for employees
        if (Auth::user()->role !== 'Employee') {
            abort(404);
        }
    }

    public function index()
    {
        return view('employee.dashboard');
    }

    public function viewEmployee()
    {
        return view('admin.employee.viewemployee');
    }



}