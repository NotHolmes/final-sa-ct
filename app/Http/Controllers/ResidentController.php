<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Organization;
use App\Models\Resident;
use App\Models\Tag;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Faker\Provider\ar_EG\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ResidentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $complaints = Complaint::latest()->paginate(50);
        // $statuses = Status::all()->select('status')->distinct()->get()->pluck('status');
        $statuses = Status::all();

        $complaint = Complaint::query();

        if( $request->filled('status')){
            $complaint->where('status', $request->status);
        }

        return view("maintenance.index", [
            'maintenance' => $complaints,
            'statuses' => $statuses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
//        $this->authorize('create', Complaint::class);
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
        $this->authorize('create', Complaint::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:1000']
        ]);

        $complaint = new Complaint();
        $complaint->title = $request->input('title');
        $complaint->description = $request->input('description');
//        $complaint->user_id = Auth::user()->id;
        $complaint->user_id = $request->user()->id;

        $organization = $request->input('organization');
        $complaint->organization_id = $organization;
        $complaint->status_id = Status::first()->id;

        $tag = $request->get('tag');

        $complaint->tag_id = $tag;

        if($request->file('image')){
            $this->storeImage($complaint, $request);
        }

        if($request->input('anonymous') == "on")
            $complaint->anonymous = TRUE;
        else {
            $complaint->anonymous = FALSE;
        }

        $complaint->save();

        return redirect()->route('maintenance.show', ['complaint' => $complaint->id]);
        //                     -------------------------^
        //                    |
        // GET|HEAD  maintenance/{complaint} ......... maintenance.show › ComplaintController@show
    }

    public function storeImage(Complaint $complaint, Request $request){
        $file = $request->file('image');
        $filename = date('YmdHi')."_".$file->getClientOriginalName();
        $file->move(public_path('/images/maintenance'), $filename);
        $complaint['image'] = $filename;
    }

    public function viewImage(Complaint $complaint){
        $imageData = $complaint['image'];
        return view();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Complaint $complaint)    // Dependency Injection
    {
        $statuses = Status::all();
        return view('maintenance.show', ['complaint' => $complaint, 'statuses' => $statuses]);
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
    public function update(Request $request, Complaint $complaint)
    {
        $this->authorize('create', Complaint::class);

        $validated = $request->validate([
            'title' => ['required', 'max:255', 'min:5'],
            'description' => ['required', 'max:1000']
        ]);

        $complaint->title = $request->input('title');
        $complaint->description = $request->input('description');

        if($request->file('image')){
            $this->storeImage($complaint, $request);
        }

        if($request->input('anonymous') == "on")
            $complaint->anonymous = TRUE;
        else {
            $complaint->anonymous = FALSE;
        }

        $complaint->save();

        return redirect()->route('maintenance.show', ['complaint' => $complaint->id]);
    }

    public function updateStatus(Request $request, Complaint $complaint){

        $status = $request->get('status');
        if(!is_null($status))
            $complaint->status_id = $status;
        else
            $complaint->status_id = Status::first()->id;

        $complaint->save();

        return redirect()->route('maintenance.show', ['complaint' => $complaint->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Complaint $complaint)
    {
        $this->authorize('delete', $complaint);

        $title = $request->input('title');
        if ($title == $complaint->title) {
            $complaint->delete();
            return redirect()->route('maintenance.index');
        }
        return redirect()->back();
    }

//    public function storeComment(Request $request, Complaint $complaint)
//    {
//        $comment = new Comment();
//        if($request->input('isEditor') == "TRUE")
//            $comment->isEditor = TRUE;
//        else
//            $comment->isEditor = FALSE;
//
//        $comment->message = $request->get('message');
//        $complaint->comments()->save($comment);
//
//        // dd($comment->isEditor);
//        return redirect()->route('maintenance.show', ['complaint' => $complaint->id]);
//    }

    public function search(Request $request) {
        $complaints = Complaint::filterTitle($request->input('search'))->get();
//        dd($filter_text);
        return view('maintenance.index', ['maintenance' => $complaints]);
    }

    public function popular() {
        $complaints = Complaint::popular()->get();
        return view('maintenance.index', ['maintenance' => $complaints]);
    }


}
