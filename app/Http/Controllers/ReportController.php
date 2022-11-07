<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Maintenance;
use App\Models\Part;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // create an array that contains string of maintenance.count and checklist.count and checklist that has status_id = 4 in each month
        $data = [];
        for($i = 1; $i <= 12; $i++){
            $data[$i] = [
                // month = full month name
                'month' => Carbon::create(2021, $i, 1)->format('F'),
                'maintenance' => Maintenance::whereMonth('created_at', $i)->count(),
                'checklist' => Checklist::whereMonth('created_at', $i)->count(),
                'checklist_done' => Checklist::whereMonth('created_at', $i)->where('status_id', 4)->count(),
                //'checklist_done_percent but take care of divide by zero too
                'checklist_done_percent' => Checklist::whereMonth('created_at', $i)->count() > 0 ? Checklist::whereMonth('created_at', $i)->where('status_id', 4)->count() / Checklist::whereMonth('created_at', $i)->count() * 100 : 0,
            ];
        }

        return view("reports", ['data' => $data]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, Part $part)
    {

    }
}
