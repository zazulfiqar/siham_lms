<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontPricing extends Model
{
    use HasFactory;
    protected $fillable  = [
        'course_duration','price','description' ,'feature_one'
        ,'feature_two','feature_three','feature_four','feature_five','title'
    ];
}
