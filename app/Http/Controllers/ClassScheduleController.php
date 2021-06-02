<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Models\ClassSchedule;
use App\Models\CourseRegistration;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;
use App\Repositories\TeacherRepository;
use Illuminate\Support\Facades\DB;
class ClassScheduleController extends Controller
{
    protected $my_class, $user;
    public function __construct(MyClassRepo $my_class, UserRepo $user, TeacherRepository $teachers )
    {


//        $this->middleware('teamSAT', ['except' => ['destroy',] ]);
//        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->teachers = $teachers;

    }
    public function class_schedule()
    {
//        dd('asdf');
        return "i am here ";
    }

    public function scheduleAClass()
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['schedule'] = $this->my_class->getAllSchedule();
//        dd('asdf');
        return view('pages.support_team.classSchedules.scheduleAClass',$d);
    }


    public function index()
    {
        $data=ClassSchedule::all();
        $id = \Auth::user()->id;
        $cr = CourseRegistration::where('user_id', $id)->pluck('courses_id');
        $zoomlink = DB::table('class_schedules')
        ->whereIn('course_id', $cr)
        ->get();
    $d['schedule'] = $zoomlink;
        return view('pages.support_team.classSchedules.index', $d);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data=$this->my_class->createSchedule($data);
        return redirect()->back();
    }

    public function show(ClassSchedule $classSchedule)
    {
        //
    }


    public function edit($id)
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['schedule'] = $this->my_class->getSchedule($id);


        // return view('pages.support_team.lectures.lecture_edit',$d);
        return view('pages.support_team.classSchedules.scheduleEdit',$d);
        // return view('pages.support_team.lectures.lecture_edit',$d);

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->my_class->updateSchedule($data,$id);
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->user->getUserByType('teacher');
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['schedule'] = $this->my_class->getAllSchedule();
//        dd('asdfasd');
        return view('pages.support_team.classSchedules.scheduleAClass',$d);
    }

    public function destroy($id)
    {
        $this->my_class->destroySchedule($id);
        return redirect()->back();
    }
}
