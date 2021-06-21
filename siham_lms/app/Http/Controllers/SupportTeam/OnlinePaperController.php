<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\OnlinePaper;
use App\Repositories\PaperRepository;
use Illuminate\Http\Request;

class OnlinePaperController extends Controller
{
    public function __construct(PaperRepository $paperRepo)
    {
//        $this->middleware('teamSA', ['only' => ['edit', 'update', 'reset_pass', 'create', 'graduated']]);
//        $this->middleware('super_admin', ['only' => ['destroy',]]);
        $this->paperRepo = $paperRepo;
    }

    public function index()
    {
        return redirect()->back();
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $data = $request->all();
        $this->paperRepo->AddQuestionsInPaper($data);
        return redirect()->back();
    }


    public function show($id)
    {
        $paperId = Qs::decodeHash($id);
        $data['questions'] = $this->paperRepo->FindQuestionsAgainstPaper($paperId);
        $data['id'] = $paperId;
        return  view('pages.support_team.questions.show',$data);
    }


    public function edit($id)
    {
        $questionId = Qs::decodeHash($id);
        $data['questionDetail'] = $this->paperRepo->FindQuestion($questionId);
        return  view('pages.support_team.questions.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $questionId = Qs::decodeHash($id);
        $data = $request->all();
        $this->paperRepo->UpdateQuestion($data,$questionId);
        return redirect()->route('onlinepaper.show',Qs::hash($request->paper_id));
    }

    public function destroy($id)
    {
        $questionId = Qs::decodeHash($id);
        $this->paperRepo->DeleteQuestion($questionId);
        return redirect()->back();

    }
}
