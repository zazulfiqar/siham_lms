<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Repositories\UserRepo;

class HomeController extends Controller
{
    protected $user;
//    protected $student_notidications;
    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function privacy_policy()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.privacy_policy', $data);
    }

    public function terms_of_use()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.terms_of_use', $data);
    }

    public function dashboard()
    {
//        dd('SAT is '.Qs::userIsTeamSAT().' and '.'Teacher is '.Qs::userIsTeacher().' and '.'Student is '.Qs::userIsStudent());
        $d=[];
        if (Qs::userIsTeacher())
        {
        $d['teacher_instructions'] = $this->user->getAllTeacherInstructions();
            $d['teacher_notifications'] = $this->user->getAllTeacherNotifications();
            $d['teacher_updates'] = $this->user->getAllTeacherUpdates();
        }
        elseif (Qs::userIsStudent())
        {
            $d['student_instructions'] = $this->user->getAllStudentInstructions();
            $d['student_notifications'] = $this->user->getAllStudentNotifications();
            $d['student_updates'] = $this->user->getAllStudentUpdates();
        }
        if(Qs::userIsTeamSAT()){
            $d['users'] = $this->user->getAll();
        }
        return view('pages.support_team.dashboard', $d);
    }
}
