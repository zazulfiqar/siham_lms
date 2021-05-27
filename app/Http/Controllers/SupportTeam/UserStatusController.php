<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use App\Repositories\UserRepo;

class UserStatusController extends Controller
{
    protected $user;

    public function __construct(UserRepo $user)
    {
        $this->middleware('teamSA', ['only' => ['index', 'store', 'edit', 'update'] ]);
        $this->middleware('super_admin', ['only' => ['reset_pass','destroy'] ]);

        $this->user = $user;
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(UserStatus $userStatus)
    {
        //
    }

    public function edit(UserStatus $userStatus)
    {
        //
    }

    public function update(Request $request, UserStatus $userStatus)
    {
        //
    }

    public function destroy(UserStatus $userStatus)
    {
        //
    }
    public function showInActiveStudents()
    {
        $data['inactiveStudents'] = $this->user->getAllInActiveStudents();
        return view('pages.support_team.students.inactiveStudents',$data);
    }
    public function showActiveStudents()
    {
//        dd('are you here ??');
        $data['activeStudents'] = $this->user->getAllActiveStudents();

        return view('pages.support_team.students.activeStudents',$data);
    }
    public function setStudentActive($sr_id)
    {
        $data['status'] =  1;
        $this->user->setStudentActive($sr_id,$data);
        return redirect()->back();
    }
    public function setStudentInActive($sr_id)
    {
        $data['status'] =  0;
        $this->user->setStudentInActive($sr_id,$data);
        return redirect()->back();
    }

    public function showInActiveTeachers()
    {

        $data['inactiveTeachers'] = $this->user->getAllInActiveTeachers();
        return view('pages.support_team.teachers.inactiveTeachers',$data);
    }

    public function showActiveTeachers()
    {


        $data['activeTeachers'] = $this->user->getAllActiveTeachers();
        return view('pages.support_team.teachers.activeTeachers',$data);
    }

    public function setTeacherActive($sr_id)
    {
        $data['status'] =  1;
        $this->user->setTeacherActive($sr_id,$data);
        return redirect()->back();
    }
    public function setTeacherInActive($sr_id)
    {
        $data['status'] =  0;
        $this->user->setTeacherInActive($sr_id,$data);
        return redirect()->back();
    }

}
