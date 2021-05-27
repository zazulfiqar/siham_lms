<?php

namespace App\Http\Controllers\SupportTeam;

use App\Models\StudentsNotifications;
use App\Repositories\AnnouncementRepository;
use App\Repositories\EvaluationRepository;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentsNotificationsController extends Controller
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
        $d['std_notifications'] = $this->announce->getStdNotification();
        return view('pages.SATSPanel.studentsNotifications.index', $d);
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
        $this->announce->createStdNotification($data);
        return redirect()->route('std_noti.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentsNotifications  $studentsNotifications
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsNotifications $studentsNotifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentsNotifications  $studentsNotifications
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['instructions'] = $this->announce->findStdNotification($id);
        return view('pages.SATSPanel.studentsNotifications.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentsNotifications  $studentsNotifications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = $req->all();
//        dd($data);
        $this->announce->updateStdNotification($id, $data); // Update Student Notifications
        return redirect()->route('std_noti.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentsNotifications  $studentsNotifications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->announce->deleteStdNotification($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
