<?php

namespace App\Http\Controllers\Admin;

use App\Models\Repair;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.repairs.viewrepairs');
    }

    public function pendingRepair()
    {
        return view('admin.repairs.pending_repairs');
    }

    public function inprogressRepair()
    {
        return view('admin.repairs.inprogress_repair');
    }

    public function completedRepair()
    {
        return view('admin.repairs.completed_repair');
    }

    public function cancelledRepair()
    {
        return view('admin.repairs.cancelled_repair');
    }


    public function repairsmanagement()
    {
        return view('admin.repairs.repairs_management');
    }

    public function addRepair()
    {
        return view('admin.repairs.add_repair');
    }

    public function repairUpdates()
    {
        return view('admin.repairs.repair_updates');
    }

    public function posRepair()
    {
        return view('admin.repairs.pos_repair');
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