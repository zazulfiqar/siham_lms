<?php

namespace App\Repositories;

use App\Models\FrontBlog;
use App\Models\FrontCourse;
use App\Models\FrontFaq;
use App\Models\FrontGallery;
use App\Models\FrontPricing;
use App\Models\FrontTestimonial;
use App\Models\Setting;
use App\Models\Subject;

//use App\Models\Setting;

class WebRepository
{

//     course Section starts
    public function getAllSubjects()
    {
        return Subject::orderBy('name', 'asc')->with(['my_class', 'teacher'])->get();
    }

    public function createSection($data)
    {
        return FrontCourse::create($data);
    }

    public function getAllFrontCourses()
    {
        return FrontCourse::all();
    }

    public function findFrontCourse($id)
    {
        return FrontCourse::find($id);
    }

    public function updateFrontCourse($id, $data)
    {
        return FrontCourse::find($id)->update($data);
    }

    public function deleteFrontCourse($id)
    {
        return FrontCourse::destroy($id);
    }

// Course Section Ends


//    Blog section starts

    public function createBlog($data)
    {
        return FrontBlog::create($data);
    }

    public function getAllFrontBlogs()
    {
        return FrontBlog::all();
    }

    public function findFrontBlog($id)
    {
        return FrontBlog::find($id);
    }

    public function updateFrontBlog($id, $data)
    {
        return FrontBlog::find($id)->update($data);
    }

    public function deleteFrontBlog($id)
    {
        return FrontBlog::destroy($id);
    }

//    front  Blog section ends here

//      front faq section starts

    public function createFaq($data)
    {
        return FrontFaq::create($data);
    }

    public function getAllFrontFaqs()
    {
        return FrontFaq::all();
    }

    public function findFrontFaq($id)
    {
        return FrontFaq::find($id);
    }

    public function updateFrontFaq($id, $data)
    {
        return FrontFaq::find($id)->update($data);
    }

    public function deleteFrontFaq($id)
    {
        return FrontFaq::destroy($id);
    }
//      front faq section ends here


//      front pricing section starts

    public function createPricing($data)
    {
        return FrontPricing::create($data);
    }

    public function getAllFrontPricings()
    {
        return FrontPricing::all();
    }

    public function getAllFrontPricingsOrderBy()
    {
        return FrontPricing::limit(2)->get();
    }

    public function findFrontPricing($id)
    {
        return FrontPricing::find($id);
    }

    public function updateFrontPricing($id, $data)
    {
        return FrontPricing::find($id)->update($data);
    }

    public function deleteFrontPricing($id)
    {
        return FrontPricing::destroy($id);
    }
//      front Pricing section ends here


//      front Testimonial section starts

    public function createTestimonial($data)
    {
//        dd($data);
        return FrontTestimonial::create($data);
    }

    public function getAllFrontTestimonials()
    {
        return FrontTestimonial::all();
    }

    public function findFrontTestimonial($id)
    {
        return FrontTestimonial::find($id);
    }

    public function updateFrontTestimonial($id, $data)
    {
        return FrontTestimonial::find($id)->update($data);
    }

    public function deleteFrontTestimonial($id)
    {
        return FrontTestimonial::destroy($id);
    }

//      front Testimonial section ends here

    public function createBanner($data)
    {
        return FrontGallery::create($data);
    }

    public function updateBaner($id, $data)
    {
        return FrontGallery::find($id)->update($data);
    }

    public function getAllFrontGalleryBanner()
    {
        $x = FrontGallery::find('1');
        return $x;
    }

    public function SettingAddress()
    {
        return Setting::where('id', '7')->get();
    }

    public function SettingPhones()
    {
        return Setting::where('id', '6')->get();
    }

    public function SettingEmail()
    {
        return Setting::where('id', '8')->get();
    }

    public function SettingGallery()
    {
//        dd('asdfasd');
       return FrontGallery::find(1);
    }


}
