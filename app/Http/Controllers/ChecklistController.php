<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Maintenance;
use App\Models\Part;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index(Request $request)
    {
        $checklists = Checklist::all();
        return view("checklist.index", ['checklists' => $checklists]);
    }

    public function show(Checklist $checklist)    // Dependency Injection
    {
        return view('checklist.show', ['checklist' => $checklist]);
    }

    public function parts(Checklist $checklist)
    {
        return view('checklist.parts', ['checklist' => $checklist, 'parts' => Part::all()]);
    }

    public function update(Request $request, Checklist $checklist){

        if($request->has('date') && $request->has('time')){
            $datetime = Carbon::parse($request->date.' '. $request->time)->toDateTime();
            $checklist->c_datetime = $datetime;
            $checklist->status_id = 3;
            $checklist->save();
        } else {
            foreach (Part::all() as $part) {
                if ($request->has($part->p_name)) {
                    $checklist->parts()->attach($part->id);
                    $checklist->status_id = 2;
                    $checklist->save();
                }
            }
        }
        return view('checklist.show', ['checklist' => $checklist]);
    }

}
