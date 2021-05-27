<?php

namespace App\Http\Controllers\SupportTeam;


use App\Http\Controllers\Controller;

use App\Models\FrontBlog;
use App\Repositories\MyClassRepo;
use App\Repositories\UserRepo;
use App\Repositories\WebRepository;
use Illuminate\Http\Request;

class FrontBlogController extends Controller
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
        $d['my_classes'] = $this->my_class->all();
        $d['sections'] = $this->my_class->getAllSections();
        $d['teachers'] = $this->user->getUserByType('teacher');
        $d['subjects'] = $this->webfront->getAllSubjects();
        $d['front_courses'] = $this->webfront->getAllFrontCourses();
        $d['front_blogs'] = $this->webfront->getAllFrontBlogs();

        return view('pages.support_team.WebManagement.blogs.index', $d);

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
//        dd($data);
        $this->webfront->createBlog($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FrontBlog $frontBlog
     * @return \Illuminate\Http\Response
     */
    public function show(FrontBlog $frontBlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FrontBlog $frontBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontBlog $frontBlog, $id)
    {
        $d['blog'] = $s = $this->webfront->findFrontBlog($id);

        return view('pages.support_team.WebManagement.blogs.edit', $d);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FrontBlog $frontBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, FrontBlog $frontBlog, $id)
    {
//        dd($req);
        $data = $req->only(['title', 'description']);
//        dd($data);
        $this->webfront->updateFrontBlog($id, $data);
//dd('asdfsdf');
//        return Qs::jsonUpdateOk();
        return redirect()->route('frontblog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FrontBlog $frontBlog
     * @return \Illuminate\Http\Response
     */

    public function destroy(FrontBlog $frontBlog, $id)
    {
        $blogId=FrontBlog::findorfail($id);
        $blogId->delete();

        // $this->webfront->deleteFrontBlog($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}

