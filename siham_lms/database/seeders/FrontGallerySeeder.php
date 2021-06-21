<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('front_galleries')->insert([
            'home_header_image' => '1',
            'course_header_image' =>'2',
            'price_header_image' => '3',
            'testimonial_header_image' => '7',
            'blog_header_image' => '4',
            'faq_header_image' => '5',
            'contact_header_image' => '6'

        ]);
    }
}
