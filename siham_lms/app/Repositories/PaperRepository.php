<?php

namespace App\Repositories;

use App\Models\OnlinePaper;
use App\Models\Paper;

class PaperRepository
{
    public function __constuct()
    {
        //
    }
    public function FindQuestionsAgainstPaper($paperId)
    {
        return $result = OnlinePaper::where('paper_id',$paperId)->get();
    }
    public function AddQuestionsInPaper($data)
    {
        $result = OnlinePaper::create($data);
        return $result;
    }
    public function FindQuestion($questionId)
    {
        return $result = OnlinePaper::find($questionId);
    }
    public function UpdateQuestion($data,$questionId)
    {
        $result = OnlinePaper::find($questionId)->update($data);
        return $result;
    }
    public function DeleteQuestion($questionId)
    {
        $question = OnlinePaper::find($questionId);
        $question->delete();
    }

    public  function  getAllPaper()
    {
        $papers = Paper::all();
        return $papers;
    }

    public function findPaperById($id)
    {
        return Paper::find($id);
    }
    public function updatePaper($id, $data)
    {
        return Paper::find($id)->update($data);
    }
    public function destroyPaper($id)
    {
        return Paper::destroy($id);
    }
}
