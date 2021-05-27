<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;
use App\Models\OnlinePaper;
use App\Models\Paper;
use App\Models\StdOnlinePaper;
use Illuminate\Http\Request;

class StdOnlinePaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.support_team.papers.open_paper');
    }

    public function openPaper(Request $request)
    {
        $unique_id = $request->exam_code;
        $paper_id = Paper::where('unique_id', $unique_id)->pluck('id');

        if (count($paper_id) == 0) {
            return redirect()->back()->with('message', 'paper not found');
        } else {
            $paperQuestions = OnlinePaper::where('paper_id', $paper_id)->get();
            return view('pages.support_team.papers.studentpaper', compact('paperQuestions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('asdasdfasfd');
        return view('pages.support_team.papers.open_paper');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $count_x = count($request->all());
        $question = [];
        for ($i = 1; $i <= count($request->answer); $i++) {
            $question[] = [
                // 'std_id' => $request->std_id[$i],
                'question_id' => $request->question_id[$i],
                'answer' => $request->answer[$i],
                'std_id' => $request->studentId,
                'paper_id' => $request->paper_id,
            ];
            echo '<pre>';
            print_r($data = end($question));
            StdOnlinePaper::insert($data);
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\StdOnlinePaper $stdOnlinePaper
     * @return \Illuminate\Http\Response
     */
    public function show(StdOnlinePaper $stdOnlinePaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StdOnlinePaper $stdOnlinePaper
     * @return \Illuminate\Http\Response
     */
    public function edit(StdOnlinePaper $stdOnlinePaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StdOnlinePaper $stdOnlinePaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StdOnlinePaper $stdOnlinePaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StdOnlinePaper $stdOnlinePaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(StdOnlinePaper $stdOnlinePaper)
    {
        //
    }
}
