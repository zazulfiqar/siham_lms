<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id','class_id','teacher_id','topic','time','zoom_link'
    ];
    public function courses()
    {
        return $this->hasOne(Courses::class,'id','course_id');
    }
    public function teachers()
    {
        return $this->hasOne(Teacher::class,'user_id','teacher_id');
    }

}
