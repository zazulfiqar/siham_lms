<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
     'user_id','name','address','email','gender','image','age','joining_date','speciality'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }

}
