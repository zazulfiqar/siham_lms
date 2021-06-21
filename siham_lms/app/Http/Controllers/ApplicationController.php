<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Courses;
use App\Models\StudentRecord;
use App\Models\Subject;
use App\Repositories\ApplicationRepo;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\Qs;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ApplicationController extends Controller
{

    protected $applicationRepository;
    public function __construct(ApplicationRepo $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//drop_a_complain
    public  function drop_a_complain()
    {
        $fetchapplication= Application::where('type',2)->latest()->get();
        $students =User::where('user_type', 'student')->get();
        $courses=Courses::all();
        $subjects=Subject::all();
        return view('pages.support_team.applications.dropComplain')
        ->with('studentName',$students)
        ->with('courcesName',$courses)
        ->with('subjectsName',$subjects)
        ->with('fetchapplication', $fetchapplication);
    }
    public  function individual_drop_a_complain()
    {
        $fetchapplication= Application::where('type',2)
            ->where('user_id',Auth::user()->id)
            ->latest()->get();
        $students =User::where('user_type', 'student')->get();
        $courses=Courses::all();
        $subjects=Subject::all();
        return view('pages.support_team.applications.dropComplain')
        ->with('studentName',$students)
        ->with('courcesName',$courses)
        ->with('subjectsName',$subjects)
        ->with('fetchapplication', $fetchapplication);
    }

    public  function  general_app()
    {
        $fetchapplication= Application::where('type',1)->latest()->get();
        $students =User::where('user_type', 'student')->get();
        $courses=Courses::all();
        $subjects=Subject::all();
        return view('pages.support_team.applications.index')
        ->with('studentName',$students)
        ->with('courcesName',$courses)
        ->with('subjectsName',$subjects)
        ->with('fetchapplication', $fetchapplication);
    }
    public  function  individual_general_app()
    {
        $fetchapplication= Application::where('type',1)
            ->where('user_id',Auth::user()->id)
            ->latest()->get();
        $students =User::where('user_type', 'student')->get();
        $courses=Courses::all();
        $subjects=Subject::all();
        return view('pages.support_team.applications.index')
            ->with('studentName',$students)
            ->with('courcesName',$courses)
            ->with('subjectsName',$subjects)
            ->with('fetchapplication', $fetchapplication);
    }
    public function manage_general_app()
    {
        return 'manage_general_app';
    }
    public function manage_complain($id)
    {
        $fetchapplication= Application::where('id',$id)->get();
        $data['fetchapplication'] = $fetchapplication;
        return view('pages.support_team.applications.manageComplain',$data);
    }
    public function manage_general_application($id)
    {
        $fetchapplication= Application::where('id',$id)->get();
        $data['fetchapplication'] = $fetchapplication;
        return view('pages.support_team.applications.manageGeneralApplication',$data);
    }

    public function store_complain_response(Request $request,$id)
    {
        $data = $request->all();
        $data['status'] = 1;
        $this->applicationRepository->storeComplainResponse($data,$id);
        return redirect()->back();
    }
    public function store_general_application_response(Request $request,$id)
    {
        $data = $request->all();
        $data['status'] = 1;
        $this->applicationRepository->storeComplainResponse($data,$id);
        return redirect()->back();
    }


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    public function general_app_store(Request $req)
    {
        $data = $req->all();
        $data['type'] = 1;
        $data['user_id'] = Auth::user()->id;
        $this->applicationRepository->createApplication($data);
        $data['code'] = strtoupper(Str::random(10));
        if($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'photo.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getUploadPath('Application').$data['code'], $f['name']);
            $data['photo'] = asset('storage/' . $f['path']);
        }
        return redirect()->back();
    }


    public function general_app_storeComplains(Request $req)
    {
        // dd($req);
        $data = $req->all();
        $data['type'] = 2;
        $data['user_id'] = Auth::user()->id;
        $this->applicationRepository->createApplication($data);
        $data['code'] = strtoupper(Str::random(10));
        if($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'photo.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getUploadPath('Application').$data['code'], $f['name']);
            $data['photo'] = asset('storage/' . $f['path']);
        }
        return redirect()->back();
    }







}
