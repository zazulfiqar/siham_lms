<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use App\Models\TeachersUpdates;
use App\Repositories\AnnouncementRepository;
use App\Repositories\EvaluationRepository;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;

class TeachersUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user, $evaluate, $announce;

    public function __construct(UserRepo $user, EvaluationRepository $evaluate
        , AnnouncementRepository $announce)
    {
        // $this->middleware('teamSA', ['except' => ['destroy',]]);
        // $this->middleware('super_admin', ['only' => ['destroy',]]);

        $this->evaluate = $evaluate;
        $this->announce = $announce;
    }

    public function index()
    {
        $d['teacher_updates'] = $this->announce->getTeacherUpdates();
        return view('pages.SATSPanel.teachersUpdates.index', $d);
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
    public function store(Request $req)
    {
        $data = $req->all();
//        dd($data);
        $this->announce->createTeacherUpdates($data);
        return redirect()->route('teacher_updates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeachersUpdates  $teachersUpdates
     * @return \Illuminate\Http\Response
     */
    public function show(TeachersUpdates $teachersUpdates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeachersUpdates  $teachersUpdates
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $data['updates'] = $this->announce->findTeacherUpdates($id);
        return view('pages.SATSPanel.teachersUpdates.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeachersUpdates  $teachersUpdates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = $req->all();
//        dd($data);
        $this->announce->updateTeacherUpdates($id, $data); // Update teacher Updates
        return redirect()->route('teacher_updates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeachersUpdates  $teachersUpdates
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $this->announce->deleteTeacherUpdates($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
