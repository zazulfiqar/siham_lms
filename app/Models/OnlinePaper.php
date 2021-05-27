<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePaper extends Model
{
    use HasFactory;
    protected $fillable = ['paper_id','question','choice1','choice2','choice3','choice4','answer'];
}
