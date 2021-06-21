<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Middleware\Custom\Teacher;
use App\Http\Requests\Exam\ExamCreate;
use App\Http\Requests\Exam\ExamUpdate;
use App\Repositories\ExamRepo;
use App\Http\Controllers\Controller;
use App\Repositories\LectureRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
//use Composer\DependencyResolver\Request;
use App\User;
use Illuminate\Http\Request;


class ExamController extends Controller
{
    protected $my_class, $user, $lecture, $teachers ,$exam;


    public function __construct(ExamRepo $exam ,MyClassRepo $my_class, UserRepo $user, TeacherRepository $teachers, LectureRepository $lecture)
    {
//        $this->middleware('teamSA', ['except' => ['destroy',] ]);
//        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->exam = $exam;
        $this->my_class = $my_class;
        $this->user = $user;
        $this->teachers = $teachers;
        $this->lecture = $lecture;

    }

    public function index()
    {
//        dd('asdfasd');
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['schedule'] = $this->my_class->getAllSchedule();
        $d['lectures'] = $this->lecture->getAllLecture();

        $d['exams'] = $this->exam->all();
        return view('pages.support_team.exams.index', $d);
    }

    public function store(Request $req)
    {
        $data = $req->all();
        $user_id = \Auth::user()->id;
        $x = User::find($user_id);
        $data['teacher_id'] = $x['id'];
        if ($req->hasFile('file'))
        {
            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('exams'), $f['name']);
            $data['file'] = $f['path'];
        }

        $this->exam->create($data);
        return back()->with('flash_success', __('msg.store_ok'));
    }

    public function edit($id)
    {
//        dd($id);
        $id = Qs::decodeHash($id);
//dd($id);
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['lecture'] = $this->lecture->findLectureById($id);
        $d['exams'] = $this->exam->find($id);

//        dd($d['exams']);

//        return view('pages.support_team.lectures.lecture_edit', $d);

        $d['ex'] = $this->exam->find($id);
        return view('pages.support_team.exams.edit', $d);
    }

    public function update(Request $req, $id)
    {
        $data = $req->all();
        if ($req->hasFile('file')) {
            $file = $req->file('file');
            $f = Qs::getFileMetaData($file);
            $f['name'] = $file->getClientOriginalName();
            $f['path'] = $file->storeAs(Qs::getTestimonialUploadPath('Lectures'), $f['name']);
            $data['file'] = $f['path'];
        }
        $id = Qs::decodeHash($id);
        $this->exam->update($id, $data);
        return redirect()->route('exams.index');

        $this->exam->update($id, $data);
        return back()->with('flash_success', __('msg.update_ok'));
    }

    public function destroy($id)
    {
//        dd('destroy');
        $this->exam->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
