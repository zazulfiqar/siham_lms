<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use App\Models\Courses;
use App\Models\StudentEvaluation;
use App\Models\StudentSurvey;
use Illuminate\Http\Request;
use App\Repositories\SurvayRepo;
use Auth;

class StudentSurveyController extends Controller
{
    protected $survayRepository;

    public function __construct(SurvayRepo $survayRepository)
    {
        $this->survayRepository = $survayRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $userId = Auth::id();


        $std_survay_id = StudentSurvey::where('std_id',$userId)->pluck('question_id')->all();

        $data = StudentEvaluation::whereNotIn('id', $std_survay_id)->get();


        return view('pages.support_team.students.studentSurvay.index')->with('survay', $data);
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

    public function surveyStore(Request $request)


    {
        $count_x = count($request->all());
        $question = [];
        for ($i = 1; $i <= count($request->answer); $i++) {
            $question[] = [
                // 'std_id' => $request->std_id[$i],
                'question_id' => $request->question_id[$i],
                'answer' => $request->answer[$i],
                'std_id' => $request->studentId,
            ];
            echo '<pre>';
            print_r($data = end($question));
            StudentSurvey::insert($data);
        }
        return redirect()->back();
    }

    public function teacher_view_survey()
    {


        $teacher_id = \Auth::user()->id;
        $course_id = Courses::where('teacher_id', $teacher_id)->pluck('id');
        $courseReg = CourseRegistration::where('courses_id', $course_id)->get();
        return view('pages.support_team.students.teacherStdFeedback',compact('courseReg'));

//        dd('asdfasdfasd');
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
     * @param \App\Models\StudentSurvey $studentSurvey
     * @return \Illuminate\Http\Response
     */
    public function show(StudentSurvey $studentSurvey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StudentSurvey $studentSurvey
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentSurvey $studentSurvey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StudentSurvey $studentSurvey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentSurvey $studentSurvey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StudentSurvey $studentSurvey
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentSurvey $studentSurvey)
    {
        //
    }


    public function show_online_paper_result()
    {

      $id = $_GET['id'];

    //   $StdOnlinePaper = StdOnlinePaper::where('std_id', '=' , '81')->get();

      $std_online_papers = \DB::table('std_online_papers')
      ->select()
      ->join('online_papers', 'online_papers.id', '=', 'std_online_papers.question_id')
      ->where('std_id', '=', $id)
      ->select(
        'std_online_papers.answer as std_online_papers_answer',
        'online_papers.answer as online_papers_answer',
        'online_papers.choice1',
        'online_papers.choice2',
        'online_papers.choice3',
        'online_papers.choice4',
    )
      ->get();

    //   echo "<pre>";
    //   print_r($std_online_papers);
    //   echo "</pre>";

    //     exit();


        return view('pages.support_team.students.studentSurvay.show_online_result',compact('std_online_papers'));

        //
    }
}
