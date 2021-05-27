<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;

use App\Models\FrontBlog;
use App\Models\FrontPricing;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\WebRepository;
use Illuminate\Http\Request;

class FrontPricingController extends Controller
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
        $d['front_courses'] = $this->webfront->getAllFrontCourses();
        $d['front_blogs'] = $this->webfront->getAllFrontBlogs();
        $d['front_pricings'] = $this->webfront->getAllFrontPricings();
        return view('pages.support_team.WebManagement.pricings.index', $d);

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
        $data = $req->all();
        $this->webfront->createPricing($data);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontPricing  $frontPricing
     * @return \Illuminate\Http\Response
     */
    public function show(FrontPricing $frontPricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPricing  $frontPricing
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontBlog $frontBlog, $id)
    {
        $d['pricings'] = $s = $this->webfront->findFrontPricing($id);
        return view('pages.support_team.WebManagement.pricings.edit', $d);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPricing  $frontPricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, FrontBlog $frontBlog, $id)
    {

        $data = $req->only([ 'course_duration','price','description' ,'feature_one'
        ,'feature_two','feature_three','feature_four','feature_five','title']);
        $this->webfront->updateFrontPricing($id, $data);

        return redirect()->route('frontpricing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPricing  $frontPricing
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontBlog $frontBlog, $id)
    {


        $pricingId = FrontPricing::findOrFail($id);

        $pricingId->delete();

        // $this->webfront->deleteFrontBlog($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }


}
