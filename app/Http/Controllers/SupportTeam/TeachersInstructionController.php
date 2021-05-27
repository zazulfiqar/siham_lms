<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use App\Models\TeachersInstruction;
use App\Repositories\AnnouncementRepository;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;

class TeachersInstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $user,  $announce;

    public function __construct(UserRepo $user, AnnouncementRepository $announce)
    {
        // $this->middleware('teamSA', ['except' => ['destroy',]]);
        // $this->middleware('super_admin', ['only' => ['destroy',]]);

        $this->announce = $announce;
    }

    public function index()
    {
        $d['teacher_instructions'] = $this->announce->getTeacherInstruction();
        return view('pages.SATSPanel.teachersInstructions.index', $d);
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
        $this->announce->createTeacherInstruction($data);
        return redirect()->route('teacher_ins.index');
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\TeachersInstruction $teachersInstruction
     * @return \Illuminate\Http\Response
     */
    public function show(TeachersInstruction $teachersInstruction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TeachersInstruction $teachersInstruction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['instructions'] = $this->announce->findTeacherInstruction($id);
        return view('pages.SATSPanel.teachersInstructions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TeachersInstruction $teachersInstruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = $req->all();
        $this->announce->updateTeacherInstruction($id, $data); // Update teacher instruction
        return redirect()->route('teacher_ins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TeachersInstruction $teachersInstruction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->announce->deleteTeacherInstruction($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}

