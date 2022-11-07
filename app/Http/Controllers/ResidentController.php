<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Organization;
use App\Models\Resident;
use App\Models\Tag;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use function MongoDB\BSON\toJSON;

class ResidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('create', Resident::class);
        $residents = Resident::all();
        return view('resident.create', [
            'residents' => $residents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->authorize('create', Resident::class);

        $resident = Resident::findByRoomNumber($request->r_room_number)->first();
        if($resident !== null){
            return redirect()->route('residents.create')->with('error', 'Room number already exists');
        }

        $resident = new Resident();
        $resident->r_name = $request->r_name;
        $resident->r_room_number = $request->r_room_number;
        $resident->r_tel = $request->r_tel;

        $user = User::findByRoomNumber($resident->r_room_number)->first();
//        dd($user);
        if($user == null){
            $user = new User();
            $user->name = $resident->r_name;
            $user->role = 'RESIDENT';
            $user->username = $resident->r_room_number;
            $user->password = bcrypt($resident->r_tel);
            $user->resident_id = $resident->id;
            $user->save();
        } else {
            $user->name = $resident->r_name;
            $user->role = 'RESIDENT';
            $user->username = $resident->r_room_number;
            $user->password = bcrypt($resident->r_tel);
            $user->resident_id = $resident->id;
            $user->save();
        }

        $resident->user_id = $user->id;
        $resident->save();

        // go to create residents
        return redirect()->route('residents.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()    // Dependency Injection
    {
//        $statuses = Status::all();
//        return view('maintenance.show', ['complaint' => $complaint, 'statuses' => $statuses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Resident $resident)
    {
//        $this->authorize('update', $complaint);

        return view('resident.edit', ['resident' => $resident]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Resident $resident)
    {
        $this->authorize('update', Resident::class);

        $resident->r_name = $request->r_name;
        $resident->r_room_number = $request->r_room_number;
        $resident->r_tel = $request->r_tel;

        $user = User::findByRoomNumber($resident->r_room_number)->first();
        if($user == null){
            $user = new User();
            $user->name = $resident->r_name;
            $user->role = 'RESIDENT';
            $user->username = $resident->r_room_number;
            $user->password = bcrypt($resident->r_tel);
            $user->resident_id = $resident->id;
            $user->save();
        } else {
            $user->name = $resident->r_name;
            $user->role = 'RESIDENT';
            $user->username = $resident->r_room_number;
            $user->password = bcrypt($resident->r_tel);
            $user->resident_id = $resident->id;
            $user->save();
        }

        $resident->user_id = $user->id;
        $resident->save();

        return redirect()->route('residents.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Resident $resident)
    {
//        $this->authorize('delete', $complaint);
//
//        $title = $request->input('title');
//        if ($title == $complaint->title) {
//            $complaint->delete();
//            return redirect()->route('maintenance.index');
//        }
//        return redirect()->back();
    }

}
