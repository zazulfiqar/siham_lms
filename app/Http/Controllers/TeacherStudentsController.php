<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Custom\Student;
use App\Models\CourseRegistration;
use App\Models\Courses;
use App\Models\TeacherStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentRecord;

class TeacherStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teaher_id = \Auth::user()->id;

//        these are testing qureies
//        $course_id = Courses::where('teacher_id',$teaher_id)->pluck('id');
//        $cr =  CourseRegistration::where('courses_id',$course_id)->get();

        $courses = DB::table('courses as c')
            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
            ->join('users as u', 'u.id', '=', 'cr.user_id')
            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
            ->get();


        return view('pages.support_team.teacher_students.index',compact('courses'));
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
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherStudents $teacherStudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherStudents $teacherStudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherStudents $teacherStudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherStudents $teacherStudents)
    {
        //
    }
}
