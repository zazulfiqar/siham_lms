<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsInstruction extends Model
{
    use HasFactory;
    protected $fillable =[
        'title' , 'details','status'
    ];
}
