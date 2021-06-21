<?php

namespace App\Http\Controllers;

use App\Models\TeacherEvaluation;
use App\Repositories\EvaluationRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;

class TeacherEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $my_class, $user, $evaluate;

    public function __construct(MyClassRepo $my_class, UserRepo $user, EvaluationRepository $evaluate)
    {
        $this->middleware('teamSA', ['except' => ['destroy',]]);
        $this->middleware('super_admin', ['only' => ['destroy',]]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->evaluate = $evaluate;
    }

    public function index()
    {
         $d['std_evaluates'] = $this->evaluate->getTeacherEvaluation();
        return view('pages.support_team.teachersEvaluation.index', $d);
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
        $this->evaluate->createTeacherEvaluation($data);
        return redirect()->route('teacher_evaluation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TeacherEvaluation $teacherEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherEvaluation $teacherEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TeacherEvaluation $teacherEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['evaluate'] = $this->evaluate->getTeacherEvaluationForm($id);
        return view('pages.support_team.teachersEvaluation.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TeacherEvaluation $teacherEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = $req->all();
        $this->evaluate->updateTeacherEvaluation($id, $data); // Update Teacher Evalaution
        return redirect()->route('teacher_evaluation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TeacherEvaluation $teacherEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->evaluate->deleteTeacherEvaluation($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
