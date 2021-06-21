<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'courses_id','user_id'
    ];
    public function offeredcourse(){
        return $this->hasOne(OfferedCourses::class,'course_id','id');
        }

        public function courses()
        {
            return $this->hasOne(Courses::class,'id','courses_id');
        }

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }


}


