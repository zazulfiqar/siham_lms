<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_header_image', 'course_header_image', 'price_header_image', 'testimonial_header_image',
        'blog_header_image', 'faq_header_image', 'contact_header_image'
    ];
}
