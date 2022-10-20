<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Status;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        $maintenances = Maintenance::all();
//        $complaints = Complaint::latest()->paginate(50);
        // $statuses = Status::all()->select('status')->distinct()->get()->pluck('status');
        $statuses = Status::all();


        if( $request->filled('status')){
            $maintenances->where('status', $request->status);
        }

        return view("maintenance.index", [
            'maintenances' => $maintenances,
            'statuses' => $statuses
        ]);
    }

    public function create()
    {
//        $this->authorize('create', Complaint::class);
        return view('maintenance.create');
    }

    public function show(Maintenance $maintenance)    // Dependency Injection
    {
        $statuses = Status::all();
        return view('maintenance.show', ['maintenance' => $maintenance, 'statuses' => $statuses]);
    }
}
