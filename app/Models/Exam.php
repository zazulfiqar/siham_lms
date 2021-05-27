<?php

namespace App\Models;

use Eloquent;

class Exam extends Eloquent
{
    protected $fillable = [
        'name', 'term', 'year','course_id','class_id','topic','description','file','teacher_id'
    ];
    public function courses()
    {
        return $this->hasOne(Courses::class,'id','course_id');
    }
    public function classes()
    {
        return $this->hasOne(ClassType::class,'id','class_id');
    }


}
