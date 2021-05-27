<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Repositories\LectureRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\PaperRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
use Illuminate\Http\Request;

class PaperController extends Controller
{

    protected $my_class, $user, $lecture, $teachers, $paperRepository;

    public function __construct(MyClassRepo $my_class, UserRepo $user, TeacherRepository $teachers
        , PaperRepository $paperRepository, LectureRepository $lecture)
    {

//        $this->middleware('teamSAT', ['except' => ['destroy',] ]);
//        $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->teachers = $teachers;
        $this->lecture = $lecture;
        $this->paperRepository = $paperRepository;

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
        $d['papers'] = $this->paperRepository->getAllPaper();
//        dd($d['papers']);
        return view('pages.support_team.papers.index', $d);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $data[] = $request->except('_token', '_method');
        $keys = array_merge(range('a', 'z'), range('A', 'Z'));
        $key = '';
        for ($i = 0; $i < 5; $i++) {

            $key .= $keys[array_rand($keys)] . rand(1, 10);
        }
        $data[0]['unique_id'] = $key;
        Paper::insert($data);

        return redirect()->back();

    }


    public function show(Paper $paper)
    {
        //
    }


    public function edit(Paper $paper, $id)
    {
        $d['my_classes'] = $this->my_class->all();
        $d['teachers'] = $this->teachers->getAllTeachers();
        $d['my_classes'] = $this->my_class->all();
        $d['subjects'] = $this->my_class->getAllSubjects();
        $d['courses'] = $this->my_class->getAllCourses();
        $d['papers'] = $this->paperRepository->findPaperById($id);

//        dd($d['lecture']);
        return view('pages.support_team.papers.edit', $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Lecture $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Paper $paper, $id)
    {
        $data = $req->all();

        $this->paperRepository->updatePaper($id, $data);
//        dd('updated data ');
        return redirect()->route('teacher.paper');
    }


    public function destroy(Paper $paper ,Request $request,$id)
    {
//     dd($id);

        $this->paperRepository->destroyPaper($id);
        return redirect()->route('teacher.paper');
    }
}
