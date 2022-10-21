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
}
