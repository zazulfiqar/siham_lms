<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frontHpmepageVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'photo',
        'youtubeurl',
        'checkWebsite'
    ];
}
