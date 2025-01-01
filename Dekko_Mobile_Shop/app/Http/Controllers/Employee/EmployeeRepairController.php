<?php

namespace App\Http\Controllers\Employee;

use App\Models\Repair;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EmployeeRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.repairs.viewrepairs');
    }


    public function repairsmanagement()
    {
        return view('employee.repairs.repairs_management');
    }

    public function addRepair()
    {
        return view('employee.repairs.add_repair');
    }

    public function repairUpdates()
    {
        return view('employee.repairs.repair_updates');
    }

    public function posRepair()
    {
        return view('employee.repairs.pos_repair');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repair $repair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repair $repair)
    {
        //
    }
}