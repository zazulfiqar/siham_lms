<?php

namespace App\Http\Controllers\SupportTeam;

//use App\Helpers\Qs;
use App\Http\Controllers\Controller;

use App\Models\FrontBlog;
use App\Models\FrontTestimonial;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\WebRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Qs;

class FrontTestimonialController extends Controller
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
        return view('pages.support_team.WebManagement.testimonials.index', $d);
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
        $data = $req->only(['name', 'description']);
        if($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = $photo->getClientOriginalName();
            $f['path'] = $photo->storeAs(Qs::getTestimonialUploadPath('testimonial'), $f['name']);

//            $data['image'] = asset('storage/' . $f['path']);
            $data['image'] = $f['path'];


            $data['image'] =  $f['path'];

        }
        $this->webfront->createTestimonial($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontTestimonial  $frontTestimonial
     * @return \Illuminate\Http\Response
     */
    public function show(FrontTestimonial $frontTestimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontTestimonial  $frontTestimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontTestimonial $frontTestimonial ,$id)
    {
//        dd('asdf');
        $d['testimonials'] = $s = $this->webfront->findFrontTestimonial($id);
//dd($d['testimonials']);
        return view('pages.support_team.WebManagement.testimonials.edit', $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontTestimonial  $frontTestimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, FrontTestimonial $frontTestimonial ,$id)
    {
        $data = $req->only(['name', 'description']);
        if($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = $photo->getClientOriginalName();
            $f['path'] = $photo->storeAs(Qs::getTestimonialUploadPath('testimonial'), $f['name']);
            $data['image'] =  $f['path'];
        }
        $this->webfront->updateFrontTestimonial($id, $data);
        return redirect()->route('fronttestimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontTestimonial  $frontTestimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontTestimonial $frontTestimonial ,$id)
    {
        $testimonialID=FrontTestimonial::findorfail($id);
        $testimonialID->delete();
        // $this->webfront->deleteFrontBlog($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
