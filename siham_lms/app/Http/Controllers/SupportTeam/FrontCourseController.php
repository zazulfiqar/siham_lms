<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Http\Requests\Section\SectionCreate;
use App\Http\Requests\Section\SectionUpdate;
use App\Models\FrontBlog;
use App\Models\FrontCourse;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\WebRepository;
use Illuminate\Http\Request;

class FrontCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $my_class, $user , $webfront;

    public function __construct(MyClassRepo $my_class, UserRepo $user , WebRepository $webfront)
    {
        // $this->middleware('teamSA', ['except' => ['destroy',] ]);
        // $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->webfront = $webfront;
    }

    public function index()
    {

        $d['my_classes'] = $this->my_class->all();
        $d['sections'] = $this->my_class->getAllSections();
        $d['teachers'] = $this->user->getUserByType('teacher');
        $d['subjects'] = $this->webfront->getAllSubjects();
        $d['front_courses'] = $this->webfront->getAllFrontCourses();

        return view('pages.support_team.WebManagement.courses.index', $d);

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
    public function store(Request $req)
    {
        $data = $req->all();
        $this->webfront->createSection($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontCourse  $frontCourse
     * @return \Illuminate\Http\Response
     */
    public function show(FrontCourse $frontCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontCourse  $frontCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontCourse $frontCourse ,$id)
    {
        $d['courses'] = $s = $this->webfront->findFrontCourse($id);
        $d['subjects'] = $this->webfront->getAllSubjects();

        return view('pages.support_team.WebManagement.courses.edit', $d);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontCourse  $frontCourse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, FrontCourse $frontCourse ,$id)
    {
        $data = $req->only(['content','id']);
        $this->webfront->updateFrontCourse($id, $data);

        return redirect()->route('frontcourse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontCourse  $frontCourse
     * @return \Illuminate\Http\Response
     */

    public function destroy(FrontCourse $frontCourse, $id)
    {
        $frontCource=FrontCourse::findorfail($id);
        $frontCource->delete();
        // $this->webfront->deleteFrontCourse($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }

}
