<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id','class_id','teacher_id','unique_id','time','topic','description'
    ];

    public function courses()
    {
        return $this->hasOne(Courses::class,'id','course_id');
    }
}

