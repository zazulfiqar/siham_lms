<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\CourseRegistration;
use App\Models\Lecture;
use App\Models\StudentAssignment;
use App\Models\Teacher;
use App\Models\TeacherAssignment;
use App\Repositories\AssignmentRepository;
use App\Repositories\LectureRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
//use http\Client\Curl\User;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAssignmentController extends Controller
{

    protected $my_class, $user, $lecture, $teachers, $assignment;

    public function __construct(MyClassRepo $my_class, UserRepo $user, TeacherRepository $teachers,
                                LectureRepository $lecture, AssignmentRepository $assignment)
    {

        $this->my_class = $my_class;
        $this->user = $user;
        $this->teachers = $teachers;
        $this->lecture = $lecture;
        $this->assignment = $assignment;

    }

    public function index()
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['schedule'] = $this->my_class->getAllSchedule();

        $std_id = \Auth::user()->id;
        $courseRegs = $this->assignment->getStdWithCourses($std_id);

        $d['assignments'] = $this->assignment->getAssignmentWithCourseId($courseRegs);
//        dd($d['assignment']);
        return view('pages.support_team.studentAssignment.index', $d);
    }

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
    public function store(Request $req)
    {
        $data = $req->all();
        $data['assignment_id'] = $req->assignment_id;
//        $teacherAssignments = TeacherAssignment::find($data['assignment_id']);

        $data['user_id']  = \Auth::user()->id;


        if ($req->hasFile('file')) {

            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('students/assignments'), $f['name']);
            $data['file'] = $f['path'];
//            dd($data['file']);
        }

        $this->assignment->createStd($data);
//        dd('asdfasfd');
        return back()->with('flash_success', __('msg.store_ok'));


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
        $teacher_id = Teacher::where('user_id', $user_id)->pluck('id');
        $x = Teacher::find($teacher_id);
        $data['teacher_id'] = $x[0]['id'];
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('Lectures'), $f['name']);
            $data['file'] = $f['path'];
        }
        $this->lecture->storeLecture($data);
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAssignment $studentAssignment)
    {
        dd('asdfasd');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAssignment $studentAssignment, $id)
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
    public function update(Request $req, StudentAssignment $studentAssignment, $id)
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
    public function destroy(StudentAssignment $studentAssignment, $id)
    {
//        dd('destroy');
        StudentAssignment::destroy($id);
        return redirect()->back();
    }
}
