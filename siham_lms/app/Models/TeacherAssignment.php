<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAssignment extends Model
{
    use HasFactory;
    protected $fillable = [
        'term','course_id','class_id','file','topic','status','description'
    ];
    public function courses()
    {
        return $this->hasOne(Courses::class,'id','course_id');
    }

    public function class()
    {
        return $this->hasOne(ClassType::class,'id','class_id');
    }



}
