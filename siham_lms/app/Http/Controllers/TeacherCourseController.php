<?php

namespace App\Http\Controllers;

use App\Models\TeacherCourse;
use App\Repositories\MyClassRepo;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;

class TeacherCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $my_class, $user;
    public function __construct(MyClassRepo $my_class, UserRepo $user, TeacherRepository $teachers )
    {
//        $this->middleware('teamSAT', ['except' => ['destroy',] ]);
//        $this->middleware('super_admin', ['only' => ['destroy',] ]);
        $this->my_class = $my_class;
        $this->user = $user;
        $this->teachers = $teachers;
    }

    public function index()
    {
        $id = \Auth::user()->id;
//        dd($id);
        $d['courses'] = $this->my_class->getCoursesByTeacherId($id);
//        dd($d['courses']);
        return view('pages.support_team.teachers.courses',$d);
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
     * @param  \App\Models\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherCourse $teacherCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherCourse $teacherCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherCourse $teacherCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherCourse  $teacherCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherCourse $teacherCourse)
    {
        //
    }

    public function getbyid(Request $request,$id )
    {
        dd('Get ID Here');
    }


}
