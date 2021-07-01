<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Custom\Student;
use App\Models\CourseRegistration;
use App\Models\Courses;
use App\Models\TeacherStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StudentRecord;
use App\Models\TeacherAssignment;
use App\Models\Paper;

use App\Repositories\AssignmentRepository;
use App\Repositories\ExamRepo;
use App\Repositories\LectureRepository;
use App\Repositories\MyClassRepo;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepo;
use App\Repositories\PaperRepository;
class TeacherStudentsController extends Controller
{


    protected $my_class, $user, $lecture, $teachers, $exam, $assignment, $paperRepository;



    public function __construct(ExamRepo $exam, MyClassRepo $my_class, UserRepo $user,
                                TeacherRepository $teachers, LectureRepository $lecture,
                                AssignmentRepository $assignment,PaperRepository $paperRepository)
    {

        $this->exam = $exam;
        $this->my_class = $my_class;
        $this->user = $user;
        $this->teachers = $teachers;
        $this->lecture = $lecture;
        $this->assignment = $assignment;
        $this->paperRepository = $paperRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teaher_id = \Auth::user()->id;

//        these are testing qureies
//        $course_id = Courses::where('teacher_id',$teaher_id)->pluck('id');
//        $cr =  CourseRegistration::where('courses_id',$course_id)->get();

        $courses = DB::table('courses as c')
            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
            ->join('users as u', 'u.id', '=', 'cr.user_id')
            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
            ->get();

      

        return view('pages.support_team.teacher_students.index',compact('courses'));
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

    public function courcestudentDetails()
    {

     $id =  $_GET['id'];

        

        $courses = DB::table('courses as c')
            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
            ->join('users as u', 'u.id', '=', 'cr.user_id')
            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
            ->where('c.id', $id)
            ->get();

            $TeacherAssignment = TeacherAssignment::where('course_id',$id)->get();
            
            
            
            $d['my_classes'] = $this->my_class->all();
            $d['teachers'] = $this->teachers->getAllTeachers();
            $d['my_classes'] = $this->my_class->all();
            $d['subjects'] = $this->my_class->getAllSubjects();
            $d['courses'] = DB::table('courses as c')
                            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
                            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
                            ->join('users as u', 'u.id', '=', 'cr.user_id')
                            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
                            ->where('c.id', $id)
                            ->get();
            $d['schedule'] = $this->my_class->getAllSchedule();
            $d['lectures'] = $this->lecture->getAllLecture();
            $d['exams'] = $this->exam->all();
            $d['assignments'] = TeacherAssignment::where('course_id',$id)->get();

            
            // echo "<pre>";
            // print_r($d);
            // echo "</pre>";
           
            // exit();


        return view('pages.support_team.teacher_students.courcestudentDetails', compact('id'));
    }



    public function courcestudentStudents()
    {

     $id =  $_GET['id'];

        

        $courses = DB::table('courses as c')
            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
            ->join('users as u', 'u.id', '=', 'cr.user_id')
            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
            ->where('c.id', $id)
            ->get();

            $TeacherAssignment = TeacherAssignment::where('course_id',$id)->get();
            
            
            
            $d['my_classes'] = $this->my_class->all();
            $d['teachers'] = $this->teachers->getAllTeachers();
            $d['my_classes'] = $this->my_class->all();
            $d['subjects'] = $this->my_class->getAllSubjects();
            $d['courses'] = DB::table('courses as c')
                            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
                            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
                            ->join('users as u', 'u.id', '=', 'cr.user_id')
                            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
                            ->where('c.id', $id)
                            ->get();
            $d['schedule'] = $this->my_class->getAllSchedule();
            $d['lectures'] = $this->lecture->getAllLecture();
            $d['exams'] = $this->exam->all();
            $d['assignments'] = TeacherAssignment::where('course_id',$id)->get();

            
            // echo "<pre>";
            // print_r($d);
            // echo "</pre>";
           
            // exit();


        return view('pages.support_team.teacher_students.courcestudentStudents',$d);
    }


    public function courcestudentassigements()
    {

     $id =  $_GET['id'];

        

        $courses = DB::table('courses as c')
            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
            ->join('users as u', 'u.id', '=', 'cr.user_id')
            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
            ->where('c.id', $id)
            ->get();

            $TeacherAssignment = TeacherAssignment::where('course_id',$id)->get();
            
            
            
            $d['my_classes'] = $this->my_class->all();
            $d['teachers'] = $this->teachers->getAllTeachers();
            $d['my_classes'] = $this->my_class->all();
            $d['subjects'] = $this->my_class->getAllSubjects();
            $d['courses'] = DB::table('courses as c')
                            ->join('course_registrations as cr', 'c.id', '=', 'cr.courses_id')
                            ->join('teachers as t', 't.user_id', '=', 'c.teacher_id')
                            ->join('users as u', 'u.id', '=', 'cr.user_id')
                            ->select('c.*','cr.*','u.name as student_name','u.email as student_email')
                            ->where('c.id', $id)
                            ->get();
            $d['schedule'] = $this->my_class->getAllSchedule();
            $d['lectures'] = $this->lecture->getAllLecture();
            $d['exams'] = $this->exam->all();
            $d['assignments'] = TeacherAssignment::where('course_id',$id)->get();

            
            // echo "<pre>";
            // print_r($d);
            // echo "</pre>";
           
            // exit();


        return view('pages.support_team.teacher_students.courcestudentassigements',$d);
    }

    public function courcestudentpapers()
    {

    $id =  $_GET['id'];


    $d['my_classes'] = $this->my_class->all();
    $d['teachers'] = $this->teachers->getAllTeachers();
    $d['my_classes'] = $this->my_class->all();
    $d['subjects'] = $this->my_class->getAllSubjects();
    $d['courses'] = $this->my_class->getAllCourses();
    $d['schedule'] = $this->my_class->getAllSchedule();
    $d['lectures'] = $this->lecture->getAllLecture();
    $d['papers'] =  Paper::where('course_id',$id)->get();


     return view('pages.support_team.teacher_students.courcestudentpapers',$d);
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
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherStudents $teacherStudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherStudents $teacherStudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherStudents $teacherStudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TeacherStudents $teacherStudents
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherStudents $teacherStudents)
    {
        //
    }
}
