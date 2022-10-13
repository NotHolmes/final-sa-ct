<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Organization;
use App\Models\Status;
use App\Models\Tag;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization_names = [];
        $number_of_organizations = [];
        $complaints = Complaint::all();
        foreach ($complaints as $complaint) {
            if (!in_array($complaint->organization->name, $organization_names)) {
                array_push($organization_names, $complaint->organization->name);
                array_push($number_of_organizations, count($complaint->organization->complaints));
            }
        }

        $tag_names = [];
        $number_of_tags = [];
        foreach ($complaints as $complaint) {
            if (!in_array($complaint->tag->name, $tag_names)) {
                array_push($tag_names, $complaint->tag->name);
                array_push($number_of_tags, count($complaint->tag->complaints));
            }
        }

        $status_names = [];
        $number_of_statuses = [];
        foreach ($complaints as $complaint) {
            if (!in_array($complaint->status->name, $status_names)) {
                array_push($status_names, $complaint->status->name);
                array_push($number_of_statuses, count($complaint->status->complaints));
            }
        }
        return view('chart', ['organization_names' => $organization_names
            , 'number_of_organizations' => $number_of_organizations
            , 'tag_names' => $tag_names
            , 'number_of_tags' => $number_of_tags
            , 'status_names' => $status_names
            , 'number_of_statuses' => $number_of_statuses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = \App\Models\Complaint::all();
        return view('complaints.show', ['complaint' => $complaint]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
