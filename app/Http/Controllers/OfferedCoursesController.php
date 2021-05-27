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
        $courseRegistration = CourseRegistration::pluck('id');
//        dd($courseRegistration);
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
