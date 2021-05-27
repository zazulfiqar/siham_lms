<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Models\Teacher;
use App\Models\CourseRegistration;
use App\Models\Lecture;
use App\Repositories\LectureRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $my_class, $user, $lecture, $teachers;

    public function __construct(MyClassRepo $my_class, UserRepo $user, TeacherRepository $teachers, LectureRepository $lecture)
    {

//        $this->middleware('teamSAT', ['except' => ['destroy',] ]);
//        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->teachers = $teachers;
        $this->lecture = $lecture;

    }

    public function uploadLecture()
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['schedule'] = $this->my_class->getAllSchedule();
        $d['lectures'] = $this->lecture->getAllLecture();

        return view('pages.support_team.lectures.uploadlecture', $d);
    }

    public function storeLecture(Request $req)
    {
        $data = $req->all();

        $user_id = \Auth::user()->id;
        $teacher_id  =  Teacher::where('user_id',$user_id)->pluck('id');
        $x = Teacher::find($teacher_id);
        $data['teacher_id'] = $x[0]['id'];
        if ($req->hasFile('file'))
        {
            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('Lectures'), $f['name']);
            $data['file'] = $f['path'];
        }
        $this->lecture->storeLecture($data);
        return redirect()->back();
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
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
//        dd('asdfasd');
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['schedule'] = $this->my_class->getAllSchedule();
//        $d['lectures'] = $this->lecture->getAllLecture();

        $id = \Auth::user()->id;
        $cr = CourseRegistration::where('user_id', $id)->pluck('courses_id');

        $lectures = DB::table('lectures')
            ->whereIn('course_id', $cr)
            ->get();
        $d['lectures'] = $lectures;
//        dd($d['lectures']);
        return view('pages.support_team.lectures.std_lecture', $d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture, $id)
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['lecture'] = $this->lecture->findLectureById($id);
        return view('pages.support_team.lectures.lecture_edit', $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Lecture $lecture, $id)
    {
        $data = $req->all();
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('Lectures'), $f['name']);
            $data['file'] = $f['path'];
        }
//        dd($data);

        $this->lecture->updatelecture($id, $data);
//        dd('updated data ');
        return redirect()->route('teacher.uploadlecture');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture,$id)
    {
        // dd($id);
        Lecture::destroy($id);

        return redirect()->back();
    }
}
