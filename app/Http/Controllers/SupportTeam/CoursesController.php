<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Requests\Courses\CourseCreate;
//use \App\Models\Courses;
use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;
use App\Http\Requests\Subject;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    protected $my_class, $user;

    public function __construct(MyClassRepo $my_class, UserRepo $user )
    {
        // $this->middleware('teamSA', ['except' => ['destroy',] ]);
        // $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;

    }

    public function index()
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->user->getUserByType('teacher');
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        return view('pages.support_team.courses.index', $d);
    }

    public function create()
    {
        //
    }


    public function store(CourseCreate $request)
    {
         $teacher_id = Qs::decodeHash($request->teacher_id);
        $data = $request->all();
        $data['teacher_id'] = $teacher_id;

        $thisdata=$this->my_class->createCourse($data);
     $getLastId=$thisdata->id;

    //  $values = array('courses_id' => $getLastId,'user_id' => $teacher_id);
    //     DB::table('course_registrations')->insert($values);

        return redirect()->route('courses.index');
    }

    public function show(Courses $courses)
    {
        //
    }

    public function edit($id)
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->user->getUserByType('teacher');
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['course'] = $this->my_class->getCourse($id);
        return view('pages.support_team.courses.edit',$d);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $dataUserId=$data['teacher_id'] = Qs::decodeHash($data['teacher_id']);
        $thisdata=$this->my_class->updateCourse($data,$id);




        return redirect()->route('courses.index');
    }

    public function destroy($id)
    {
        $this->my_class->updateDelete($id);
        return redirect()->back();

    }
}
