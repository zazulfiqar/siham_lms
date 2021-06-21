<?php

namespace App\Http\Controllers\SupportTeam;

use App\Http\Controllers\Controller;

use App\Models\FrontFaq;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\WebRepository;
use Illuminate\Http\Request;

class FrontFaqController extends Controller
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
        $d['front_faq'] = $this->webfront->getAllFrontFaqs();
        return view('pages.support_team.WebManagement.faqs.index', $d);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = $req->all();
        $this->webfront->createFaq($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FrontFaq $frontFaq
     * @return \Illuminate\Http\Response
     */
    public function show(FrontFaq $frontFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FrontFaq $frontFaq
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontFaq $frontFaq, $id)
    {
        $d['faq'] = $s = $this->webfront->findFrontFaq($id);
//dd($d['faq']);
        return view('pages.support_team.WebManagement.faqs.edit', $d);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FrontFaq $frontFaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, FrontFaq $frontFaq, $id)
    {
//        dd($req);
        $data = $req->only(['faq', 'description']);
        $this->webfront->updateFrontFaq($id, $data);
        return redirect()->route('frontfaq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FrontFaq $frontFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontFaq $frontFaq, $id)
    {
        $faqId=FrontFaq::findorfail($id);
        $faqId->delete();

        // $this->webfront->deleteFrontBlog($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }


}
