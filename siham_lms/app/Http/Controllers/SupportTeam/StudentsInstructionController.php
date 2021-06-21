<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use App\Models\StudentsInstruction;
use App\Repositories\AnnouncementRepository;
use App\Repositories\EvaluationRepository;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;

class StudentsInstructionController extends Controller
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
        $d['std_instructions'] = $this->announce->getStdInstruction();
        return view('pages.SATSPanel.studentsInstructions.index', $d);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = $req->all();
        $this->announce->createStdInstruction($data);
        return redirect()->route('std_ins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\StudentsInstruction $studentsInstruction
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsInstruction $studentsInstruction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StudentsInstruction $studentsInstruction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['instructions'] = $this->announce->findStdInstruction($id);
        return view('pages.SATSPanel.studentsInstructions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StudentsInstruction $studentsInstruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = $req->all();
        $this->announce->updateStdInstruction($id, $data); // Update Student Evalaution
        return redirect()->route('std_ins.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StudentsInstruction $studentsInstruction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->announce->deleteStdInstruction($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
