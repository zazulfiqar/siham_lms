<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\TeacherAssignment;
use App\Repositories\AssignmentRepository;
use App\Repositories\ExamRepo;
use App\Repositories\LectureRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
use App\User;
use Illuminate\Http\Request;

class TeacherAssignmentController extends Controller
{
    protected $my_class, $user, $lecture, $teachers, $exam, $assignment;


    public function __construct(ExamRepo $exam, MyClassRepo $my_class, UserRepo $user,
                                TeacherRepository $teachers, LectureRepository $lecture,
                                AssignmentRepository $assignment)
    {

        $this->exam = $exam;
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
        $d['lectures'] = $this->lecture->getAllLecture();
        $d['exams'] = $this->exam->all();
        $d['assignments'] = $this->assignment->all();
//        dd($d['assignments']);
        return view('pages.support_team.teacherAssignment.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->all();
//        dd($data);
        $user_id = \Auth::user()->id;
        $x = User::find($user_id);
        $data['teacher_id'] = $x['id'];
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('assignments'), $f['name']);
            $data['file'] = $f['path'];
        }
        $this->assignment->create($data);
        return back()->with('flash_success', __('msg.store_ok'));
    }

    public function edit($id)
    {
        $id = Qs::decodeHash($id);
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['lecture'] = $this->lecture->findLectureById($id);
//        $d['exams'] = $this->exam->find($id);

        $d['assignments'] = $this->assignment->find($id);
//        $d['ex'] = $this->exam->find($id);
        return view('pages.support_team.teacherAssignment.edit', $d);
    }

    public function update(Request $req, $id)
    {
//        dd($req);
        $data = $req->all();
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('assignments'), $f['name']);
            $data['file'] = $f['path'];
        }
        $id = Qs::decodeHash($id);
        $this->assignment->update($id, $data);
        return redirect()->route('teacher_assignment.index');
    }

    public function destroy($id)
    {
        dd('destroy');

        $this->assignment->delete($id);
        dd('destroy');

        return back()->with('flash_success', __('msg.del_ok'));
    }

    public function show($id)
    {
        $id = Qs::decodeHash($id);
        $this->assignment->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }


}
