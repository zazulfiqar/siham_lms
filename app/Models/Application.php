<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id' , 'email','subject','application','cell','photo','type','to_send','status','response'
    ];
    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}
