<?php

namespace App\Http\Controllers\SupportTeam;


use App\Helpers\Qs;
use App\Models\Reporting;
use App\Models\Teacher;
use App\Repositories\LocationRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\PolicyRepository;
use App\Repositories\StudentRepo;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use http\Env\Request;


class ReportingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $loc, $my_class, $user, $student, $teacher, $lga,$policy;

    public function __construct(LocationRepo $loc, UserRepo $user, MyClassRepo $my_class, TeacherRepository $teacher,
                                StudentRepo $student, PolicyRepository $policy)

    {
        $this->middleware('teamSA', ['only' => ['edit', 'update', 'reset_pass', 'create', 'store', 'graduated']]);
        $this->middleware('super_admin', ['only' => ['destroy',]]);
        $this->loc = $loc;
        $this->my_class = $my_class;
        $this->user = $user;
        $this->teacher = $teacher;
        $this->student = $student;
        $this->policy = $policy;
    }

    public function teacher_rules()
    {
        $d['policies'] = $this->policy->teacher_policy();
        return view('pages.support_team.policies.teacher_policy', $d);
    }

    public function student_rules()
    {
        $d['policies'] = $this->policy->student_policy();
//dd($d['policies']);
        return view('pages.support_team.policies.student_policy', $d);
    }


    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Reporting $reporting
     * @return \Illuminate\Http\Response
     */
    public function show(Reporting $reporting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Reporting $reporting
     * @return \Illuminate\Http\Response
     */
    public function edit(Reporting $reporting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reporting $reporting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reporting $reporting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reporting $reporting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reporting $reporting)
    {
        //
    }

    public function teachers_list(Teacher $teacher)
    {
        $mc = $this->teacher->getTeacherData();
        $teachers = $mc;
        return is_null($mc) ? Qs::goWithDanger() : view('pages.support_team.teachers.list', compact('teachers'));
    }

    public function listByClass($class_id)
    {
        $data['my_class'] = $mc = $this->my_class->getMC(['id' => $class_id])->first();
        $data['students'] = $this->student->findStudentsByClass($class_id);
        $data['sections'] = $this->my_class->getClassSections($class_id);

        return is_null($mc) ? Qs::goWithDanger() : view('pages.support_team.students.list', $data);
    }


}
