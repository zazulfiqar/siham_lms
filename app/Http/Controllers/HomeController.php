<?php

namespace App\Http\Controllers;
use App\Models\ClassSchedule;
use App\Models\CourseRegistration;
use App\Helpers\Qs;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\DB;

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
            $data=ClassSchedule::all();
            $id = \Auth::user()->id;
            $cr = CourseRegistration::where('user_id', $id)->pluck('courses_id');
            $zoomlink = DB::table('class_schedules')
            ->whereIn('course_id', $cr)
            ->get();
            $d['schedule'] = $zoomlink;





            $d['student_instructions'] = $this->user->getAllStudentInstructions();
            $d['student_notifications'] = $this->user->getAllStudentNotifications();
            $d['student_updates'] = $this->user->getAllStudentUpdates();

            $data = \DB::table('course_registrations as cr')
            ->join('courses as c', 'c.id','=','cr.courses_id')
             ->get();
        return view('pages.support_team.dashboard')
        ->with('CourseRegisterd',$data)
        ->with('student_instructions', $d['student_instructions'])
        ->with('student_notifications',$d['student_notifications'])
        ->with('schedule',$d['schedule'])
        ->with('student_updates',$d['student_updates']);


        }
        if(Qs::userIsTeamSAT()){
            $d['users'] = $this->user->getAll();
        }
        return view('pages.support_team.dashboard', $d);
    }
}
