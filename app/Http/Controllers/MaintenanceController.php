<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Resident;
use App\Models\Status;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index(Request $request)
    {
        $maintenances = Maintenance::all();
        return view("maintenance.index", ['maintenances' => $maintenances]);

    }

    public function table(Request $request){
        $maintenances = Maintenance::all()->sortBy('created_at', SORT_REGULAR, false);
        return view("maintenance.table", ['maintenances' => $maintenances]);
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

        if($request->file('m_image')){
            $this->storeImage($request, $maintenance);
        }

        $maintenance->save();

        $this->show($maintenance);
    }

    public function storeImage(Request $request, Maintenance $maintenance){
        $file = $request->file('m_image');
        $filename = date('YmdHi')."_".$file->getClientOriginalName();
        $file->move(public_path('/images/maintenance'), $filename);
        $maintenance['m_image'] = $filename;
    }

    public function show(Maintenance $maintenance)    // Dependency Injection
    {
        return view('maintenance.show', ['maintenance' => $maintenance]);
    }
}
