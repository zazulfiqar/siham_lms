<?php

namespace App\Http\Controllers\SupportTeam;

use App\Models\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Http\Request;
use App\Helpers\Qs;
use App\Helpers\Mk;
use App\Http\Requests\Student\StudentRecordCreate;
use App\Http\Requests\Student\StudentRecordUpdate;
use App\Repositories\LocationRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\StudentRepo;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $loc, $my_class, $user, $student, $teacher, $lga;

//    public function __construct(LocationRepo $loc, MyClassRepo $my_class, UserRepo $user, StudentRepo $student)
    public function __construct(LocationRepo $loc, UserRepo $user, MyClassRepo $my_class, TeacherRepository $teacher)

    {
        $this->middleware('teamSA', ['only' => ['edit', 'update', 'reset_pass', 'create', 'graduated']]);
        $this->middleware('super_admin', ['only' => ['destroy',]]);
        $this->loc = $loc;
        $this->my_class = $my_class;
        $this->user = $user;
        $this->teacher = $teacher;
//        $this->student = $student;
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
//        dd('asdf');
//        $data['my_classes'] = $this->my_class->all();
        $data['parents'] = $this->user->getUserByType('parent');
//        $data['dorms'] = $this->student->getAllDorms();
        $data['states'] = $this->loc->getStates();
        $data['nationals'] = $this->loc->getAllNationals();
//        dd($data);
        return view('pages.support_team.teachers.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data['user_type'] = 'teacher';
        $password = Hash::make('teacher'); // Default teacher password
        $data['password'] = $password;
        $data['name'] = $req->name;
        $data['address'] = $req->address;
        $data['email'] = $req->email;
        $data['gender'] = $req->gender;
        $data['nal_id'] = $req->nal_id;
        $data['state_id'] = $req->state_id;
        $data['lga_id'] = $req->lga_id;
        $data['joining_date'] = $req->year_admitted;
        $data['age'] = $req->age;
        $data['speciality'] = $req->teaching_speciality;
        $data['code'] = strtoupper(Str::random(10));
        $data['username'] = $req->name;


        if ($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'photo.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getUploadPath('teacher') . $data['code'], $f['name']);
            $data['photo'] = asset('storage/' . $f['path']);
        }

        $user = $this->user->create($data); // Create User
        $sr['adm_no'] = $data['username'];
        $sr['user_id'] = $user->id;
        $sr['session'] = Qs::getSetting('current_session');
        $data['user_id'] = $sr['user_id'];

        $teachers = Teacher::create($data);
        Qs::jsonStoreOk();

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Teacher $teacher
     * @return \Illuminate\Http\Response
     */
//    public function show(Teacher $teacher )
    public function show($teach_id)
    {
        $teach_id = Qs::decodeHash($teach_id);
        if (!$teach_id) {
            return Qs::goWithDanger();
        }
        $tech = $this->teacher->getRecord(['id' => $teach_id])->first();
        if (Auth::user()->id != $tech->user_id && !Qs::userIsTeamSAT() && !Qs::userIsMyChild($tech->user_id, Auth::user()->id)) {
            return redirect(route('dashboard'))->with('pop_error', __('msg.denied'));
        }
        return view('pages.support_team.teachers.show', compact('tech'));
    }


    public function edit($teach_id)
    {
        $teach_id = Qs::decodeHash($teach_id);
        if (!$teach_id) {
            return Qs::goWithDanger();
        }

        $data['tr'] = $this->teacher->getRecord(['id' => $teach_id])->first();
        $data['my_classes'] = $this->my_class->all();
        $data['parents'] = $this->user->getUserByType('parent');
        $data['dorms'] = $this->teacher->getAllDorms();
        $data['states'] = $this->loc->getStates();
        $data['lga'] = $this->loc->getLGAs($data['tr']->state_id);
        $data['nationals'] = $this->loc->getAllNationals();
        return view('pages.support_team.teachers.edit', compact('data'));

    }


    public function update(Request $request, $teach_id)
    {
        $teach_id = Qs::decodeHash($teach_id);
        if (!$teach_id) {
            return Qs::goWithDanger();
        }
        $sr = $this->teacher->getRecord(['id' => $teach_id])->first();
        $d = $request->only(Qs::getUserRecord());
        $d['name'] = ucwords($request->name);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'photo.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getUploadPath('teacher') . $sr->user->code, $f['name']);
            $d['photo'] =  $f['path'];
        }
        $this->user->update($sr->user->id, $d); // Update User Details
        $trec = $request->only(Qs::getTeacherData());
        $this->teacher->updateRecord($teach_id, $trec); // Update St Rec
        return redirect()->route('teachers.list');

    }

    public function destroy(Teacher $teacher)
    {
        //
    }

    public function list(Teacher $teacher)
    {
        $mc = $this->teacher->getTeacherData();
        $teachers = $mc;
        return is_null($mc) ? Qs::goWithDanger() : view('pages.support_team.teachers.list', compact('teachers'));
    }

    public function resetPassword($teacher_id)
    {
        $teacher_id = Qs::decodeHash($teacher_id);
        $data['password'] = Hash::make('teacher');
        $this->user->update($teacher_id, $data);
        return back()->with('flash_success', __('msg.p_reset'));
    }


}
