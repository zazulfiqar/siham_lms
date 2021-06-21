<?php

namespace App\Repositories;

use App\Models\StudentEvaluation;
use App\Models\TeacherEvaluation;

class EvaluationRepository
{
    public function __constuct()
    {
        //
    }
    public function createStudentEvaluation($data)
    {
        return StudentEvaluation::create($data);
    }
    public function getStudentEvaluation()
    {
        return StudentEvaluation::all();
    }
    public function getEvaluationForm($id)
    {
        return StudentEvaluation::find($id);
    }
    public function updateStudentEvaluation($id, $data)
    {
        return StudentEvaluation::find($id)->update($data);
    }
    public function deleteEvaluation($id)
    {
        return StudentEvaluation::destroy($id);
    }


    public function createTeacherEvaluation($data)
    {
        return TeacherEvaluation::create($data);
    }
    public function getTeacherEvaluation()
    {
        return TeacherEvaluation::all();
    }
    public function getTeacherEvaluationForm($id)
    {
        return TeacherEvaluation::find($id);
    }
    public function updateTeacherEvaluation($id, $data)
    {
        return TeacherEvaluation::find($id)->update($data);
    }
    public function deleteTeacherEvaluation($id)
    {
        return TeacherEvaluation::destroy($id);
    }


}
