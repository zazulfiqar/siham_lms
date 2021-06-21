<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSurvey extends Model
{
    use HasFactory;
    protected $fillable = [
        'std_id', 'question_id', 'answer'
    ];

    public function std_evalutaions()
    {
        return $this->hasOne(StudentEvaluation::class,'id','questionid');
    }
}
