<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use App\Models\Courses;
use App\Models\OfferedCourses;
use Illuminate\Http\Request;

class OfferedCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();

        // dd($courses);
        $courseRegistration = CourseRegistration::pluck('id');

        return view('pages.support_team.offeredCourses.index', compact('courses', 'courseRegistration'));
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
     * @param \App\Models\OfferedCourses $offeredCourses
     * @return \Illuminate\Http\Response
     */
    public function show(OfferedCourses $offeredCourses)
    {
        //
    }

    public function addtopic()
    {

    $id = $_GET['id'];

    $topics = \DB::table('courses_study_plan')
            ->where('course_id', $id)
            ->get();
     
//     echo "<pre>";
//      print_r($topics);  
//      echo "</pre>";

// exit();
    return view('pages.support_team.courses.addcourses', compact('id','topics'));
    // echo "wwww";
    //
    }

public function addtopicsub(Request $request)
{

        $data = \DB::table('courses_study_plan')->insert([
        'name' => $request->name,
        'study_plan' => $request->content,
        'course_id' => $request->courseid,
        ]);

        return redirect()->back();

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\OfferedCourses $offeredCourses
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferedCourses $offeredCourses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OfferedCourses $offeredCourses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferedCourses $offeredCourses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\OfferedCourses $offeredCourses
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferedCourses $offeredCourses)
    {
        //
    }
}
