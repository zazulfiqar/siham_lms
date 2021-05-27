<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\FrontGallery;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\WebRepository;
use Illuminate\Http\Request;

class FrontGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $my_class, $user, $webfront;

    public function __construct(MyClassRepo $my_class, UserRepo $user, WebRepository $webfront)
    {
        // $this->middleware('teamSA', ['except' => ['destroy',]]);
        // $this->middleware('super_admin', ['only' => ['destroy',]]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->webfront = $webfront;
    }

    public function index()
    {
        $d['front_testimonials'] = $this->webfront->getAllFrontTestimonials();
        return view('pages.support_team.WebManagement.gallerys.index', $d);
    }

    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if ($req->hasFile('home_header_image')) {
            $home_photo = $req->file('home_header_image');
            $f = Qs::getFileMetaData($home_photo);
            $f['name'] = $home_photo->getClientOriginalName();
            $f['path'] = $home_photo->storeAs(Qs::getTestimonialUploadPath('banner'), $f['name']);
            $data['home_header_image'] = $f['path'];
        }
        if ($req->hasFile('course_header_image')) {
            $home_photo = $req->file('course_header_image');
            $f = Qs::getFileMetaData($home_photo);
            $f['name'] = $home_photo->getClientOriginalName();
            $f['path'] = $home_photo->storeAs(Qs::getTestimonialUploadPath('banner'), $f['name']);
            $data['course_header_image'] = $f['path'];
        }
        if ($req->hasFile('price_header_image')) {
            $home_photo = $req->file('price_header_image');
            $f = Qs::getFileMetaData($home_photo);
            $f['name'] = $home_photo->getClientOriginalName();
            $f['path'] = $home_photo->storeAs(Qs::getTestimonialUploadPath('banner'), $f['name']);
            $data['price_header_image'] = $f['path'];
        }
        if ($req->hasFile('testimonial_header_image')) {
            $home_photo = $req->file('testimonial_header_image');
            $f = Qs::getFileMetaData($home_photo);
            $f['name'] = $home_photo->getClientOriginalName();
            $f['path'] = $home_photo->storeAs(Qs::getTestimonialUploadPath('banner'), $f['name']);
            $data['testimonial_header_image'] = $f['path'];
        }
        if ($req->hasFile('blog_header_image')) {
            $home_photo = $req->file('blog_header_image');
            $f = Qs::getFileMetaData($home_photo);
            $f['name'] = $home_photo->getClientOriginalName();
            $f['path'] = $home_photo->storeAs(Qs::getTestimonialUploadPath('banner'), $f['name']);
            $data['blog_header_image'] = $f['path'];
        }
        if ($req->hasFile('faq_header_image')) {
            $home_photo = $req->file('faq_header_image');
            $f = Qs::getFileMetaData($home_photo);
            $f['name'] = $home_photo->getClientOriginalName();
            $f['path'] = $home_photo->storeAs(Qs::getTestimonialUploadPath('banner'), $f['name']);
            $data['faq_header_image'] = $f['path'];
        }
        if ($req->hasFile('contact_header_image')) {
            $home_photo = $req->file('contact_header_image');
            $f = Qs::getFileMetaData($home_photo);
            $f['name'] = $home_photo->getClientOriginalName();
            $f['path'] = $home_photo->storeAs(Qs::getTestimonialUploadPath('banner'), $f['name']);
            $data['contact_header_image'] = $f['path'];
        }
        $id = 1;
        $this->webfront->updateBaner($id,$data);
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontGallery  $frontGallery
     * @return \Illuminate\Http\Response
     */
    public function show(FrontGallery $frontGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontGallery  $frontGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontTestimonial $frontTestimonial, $id)
    {
//        dd('asdf');
        $d['testimonials'] = $s = $this->webfront->findFrontTestimonial($id);
//dd($d['testimonials']);
        return view('pages.support_team.WebManagement.gallerys.edit', $d);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontGallery  $frontGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, FrontTestimonial $frontTestimonial, $id)
    {
        $data = $req->only(['name', 'description']);
        if ($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = $photo->getClientOriginalName();
            $f['path'] = $photo->storeAs(Qs::getTestimonialUploadPath('testimonial'), $f['name']);
            $data['image'] = $f['path'];
        }
        $this->webfront->updateFrontTestimonial($id, $data);
        return redirect()->route('fronttestimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontGallery  $frontGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontTestimonial $frontTestimonial, $id)
    {
        $testimonialID = FrontTestimonial::findorfail($id);
        $testimonialID->delete();
        // $this->webfront->deleteFrontBlog($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
