<?php

namespace App\Http\Controllers;
use App\Models\frontHomepageGallery;
use App\Http\Controllers\Controller;
use App\Models\FrontBlog;
use App\Models\FrontGallery;
use App\Models\Subject;
use App\Models\FrontCourse;
use App\Models\Setting;
use App\Repositories\WebRepository;
use Illuminate\Http\Request;
use App\Models\FrontFaq;
use App\Models\FrontPricing;
use App\Models\FrontTestimonial;
use App\Models\Lga;
use App\Models\Nationality;
use App\Models\State;
use App\Models\homepagefront;
use App\Helpers\Qs;
use App\Helpers\Mk;
use App\Http\Requests\Student\StudentRecordCreate;
use App\Http\Requests\Student\StudentRecordUpdate;
use App\Repositories\LocationRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\StudentRepo;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class frontendController extends Controller
{
    protected $loc, $my_class, $user, $student, $web;

    public function __construct(LocationRepo $loc, MyClassRepo $my_class, UserRepo $user,
                                StudentRepo $student, WebRepository $web)
    {
        $this->middleware('teamSA', ['only' => ['edit', 'update', 'reset_pass', 'create', 'store', 'graduated']]);
        $this->middleware('super_admin', ['only' => ['destroy',]]);

        $this->loc = $loc;
        $this->my_class = $my_class;
        $this->user = $user;
        $this->student = $student;
        $this->web = $web;
    }

    function indexfront()
    {
        $frontDynamic = homepagefront::all();
        $subjects = Subject::all();
        $getRecordFrontHomeGallery = frontHomepageGallery::all();
        $blogs = $this->web->getAllFrontBlogs();
        $faqs = $this->web->getAllFrontFaqs();
        $pricing = $this->web->getAllFrontPricingsOrderBy();
        $testimonials = $this->web->getAllFrontTestimonials();
        $frontgallery =$this->web->getAllFrontGalleryBanner();
        $home_header_image = $frontgallery->home_header_image;
        return view('frontend.index', compact('getRecordFrontHomeGallery','frontDynamic','subjects', 'blogs',
                'faqs', 'pricing', 'testimonials', 'frontgallery', 'home_header_image')
        );
    }


    function blogfront()
    {
        $blogs = FrontBlog::all();
        $frontgallery = FrontGallery::find(1);
        $blog_header_image = $frontgallery->blog_header_image;
        return view('frontend.blog', compact('blogs', 'blog_header_image'));
    }

    function contactfront()
    {

        $contactsAddress = $this->web->SettingAddress();
//        Setting::where('id', '7')->get();
        $contactsPhone = $this->web->SettingPhones();
//            Setting::where('id', '6')->get();
        $contactsEmail = $this->web->SettingEmail();
//            Setting::where('id', '8')->get();
        $frontgallery = $this->web->SettingGallery();
//            FrontGallery::find(1);

//        dd($frontgallery);

        $contact_header_image = $frontgallery->contact_header_image;

        return view('frontend.contact',
            compact('contactsAddress', 'contactsPhone', 'contactsEmail', 'contact_header_image'));
    }



    function coursesfront()
    {
        $subjects = Subject::all();
        $frontCources = FrontCourse::all();

        $frontgallery = FrontGallery::find(1);
        $course_header_image = $frontgallery->course_header_image;
//        dd($course_header_image);
        return view('frontend.courses', compact('frontCources', 'subjects', 'course_header_image'));
    }

    function faqfront()
    {
        $faqs = FrontFaq::all();
        $frontgallery = FrontGallery::find(1);
        $faq_header_image = $frontgallery->faq_header_image;

        return view('frontend.faq', compact('faqs', 'faq_header_image'));
    }

    function pricingfront()
    {
        $pricing = FrontPricing::all();
        $frontgallery = FrontGallery::find(1);
        $price_header_image = $frontgallery->price_header_image;
        return view('frontend.pricing', compact('pricing', 'price_header_image'));
    }


    function teacherRegister()
    {

        //        $data['my_classes'] = $this->my_class->all();
        $data['parents'] = $this->user->getUserByType('parent');
        //        $data['dorms'] = $this->student->getAllDorms();
        $data['states'] = $this->loc->getStates();
        $data['nationals'] = $this->loc->getAllNationals();
        //        dd($data);

        return view('frontend.teacherAdd', $data);
    }

    function registerfront()
    {
        $data['my_classes'] = $this->my_class->all();
        $data['parents'] = $this->user->getUserByType('parent');
        $data['dorms'] = $this->student->getAllDorms();
        $data['states'] = $this->loc->getStates();
        $data['nationals'] = $this->loc->getAllNationals();
        // $datanationality = Nationality::all();
        // $datastate = State::all();
        // $lga = Lga::all();
        // $nationals['nationals'] = Nationality::all();
        // dd($nationals);
        // dd($nationals['nationals']);

        return view('frontend.register', $data);
        // ->with('nationality',$datanationality)
        // ->with('state',$datastate)
        // ->with('lga',$lga);
    }

    function testimonialsfront()
    {
        $testimonials = FrontTestimonial::all();
        $frontgallery = FrontGallery::find(1);
        $testimonial_header_image = $frontgallery->testimonial_header_image;
//        dd($testimonial_header_image);
        return view('frontend.testimonials', compact('testimonials', 'testimonial_header_image'));
    }


    public function  blogdetail($id)
    {
            $frontblog =  FrontBlog::find($id);
//            dd($frontblog);
        return view('frontend.blogdetails',compact('frontblog'));

    }

    public function  onlineTutor()
    {
        // dd('Online Tutor');
        return view('frontend.onlineTutor');

    }


    public function  onlineClasses()
    {
        // dd('Online Tutor');
        return view('frontend.onlineClasses');

    }





}
