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

    public function store(Request $request)
    {
//        $this->authorize('create', Complaint::class);

        $maintenance = new Maintenance();
        $maintenance->user_id = auth()->user()->id;
        $maintenance->m_detail = $request->m_detail;

        if($request->m_image)
            $maintenance->m_image = $request->m_image;

        $maintenance->save();

        return redirect()->route('maintenances.index');
        return redirect()->route('maintenances.show', ['maintenance' => $maintenance]);
    }

    public function show(Maintenance $maintenance)    // Dependency Injection
    {
        $statuses = Status::all();
        return view('maintenance.show', ['maintenance' => $maintenance, 'statuses' => $statuses]);
    }
}
