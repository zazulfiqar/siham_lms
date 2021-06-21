<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id', 'class_id', 'teacher_id', 'file', 'topic', 'description'
    ];

    public function courses()
    {
        return $this->hasMany(Courses::class, 'id', 'course_id');
    }

}
