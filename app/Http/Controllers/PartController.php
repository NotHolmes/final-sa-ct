<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index(Request $request)
    {
        $parts = Part::all();
        return view("part.index", ['parts' => $parts]);
    }

    public function create()
    {
        return view('part.create');
    }

    public function store(Request $request)
    {
//        $this->authorize('create', Complaint::class);

        $part = Part::findByName($request->p_name)->first();
        if($part == null){
            $part = new Part();
            $part->p_name = $request->p_name;
            $part->p_quantity = $request->p_quantity;
            $part->save();
        }

        return view('part.index', ['parts' => Part::all()]);
    }

    public function update(Request $request, Part $part)
    {
        $part->p_quantity = (int)$request->p_quantity;
        $part->save();

        return view('part.index', ['parts' => Part::all()]);
    }
}
