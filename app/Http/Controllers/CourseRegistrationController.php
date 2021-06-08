<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \DB::table('course_registrations as cr')
            ->join('courses as c', 'c.id','=','cr.courses_id')
             ->get();
        return view('pages.support_team.courseRegistrations.index')->with('CourseRegisterd',$data);

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
    public function store(Request $request, $id)
    {

        $data['courses_id'] = $id;
        $data['user_id'] = \Auth::user()->id;


        $course_data = CourseRegistration::
            where('user_id', $data['user_id'])
            ->where('courses_id', $data['courses_id'])
            ->get();

        if(count($course_data) > 0)
        {
            return redirect()->route('students.offered_courses');
        }
        else {
            CourseRegistration::create($data);
        }
        return redirect()->route('students.offered_courses');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseRegistration $courseRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CourseRegistration $courseRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseRegistration $courseRegistration)
    {
        //
    }

    public function courcestudentDetails(Request $request)
    {
        return view('pages.support_team.courseRegistrations.courseDetails')->with('details',$request);
    }



}
