<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Models\StudentEvaluation;
use App\Repositories\EvaluationRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;

class StudentEvaluationController extends Controller
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
        $d['std_evaluates'] = $this->evaluate->getStudentEvaluation();
        return view('pages.support_team.studentsEvaluation.index', $d);
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
        $this->evaluate->createStudentEvaluation($data);
        return redirect()->route('student_evaluation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\StudentEvaluation $studentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(StudentEvaluation $studentEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StudentEvaluation $studentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['evaluate'] = $this->evaluate->getEvaluationForm($id);
        return view('pages.support_team.studentsEvaluation.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StudentEvaluation $studentEvaluation
     * @return \Illuminate\Http\Response
     */


    public function update(Request $req, $id)
    {
        $data = $req->all();
        $this->evaluate->updateStudentEvaluation($id, $data); // Update Student Evalaution
        return redirect()->route('student_evaluation.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StudentEvaluation $studentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->evaluate->deleteEvaluation($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}


