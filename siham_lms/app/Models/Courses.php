<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'teacher_id', 'code', 'description','my_class_id','time_slot','type'];


    public function subjects ()
    {
        return $this->belongsTo(Subject::class,'id','subject_id');
    }

    public function teachers()
    {
        return $this->hasOne(Teacher::class,'id','teacher_id');
    }

    public function classes()
    {
        return $this->hasOne(MyClass::class,'id','my_class_id');
    }
    public function student()
    {
        dd('are ypou here');
        return $this->hasOne(MyClass::class,'id','user_id');
    }


}
