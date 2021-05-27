<?php

namespace App\Http\Controllers\SupportTeam;


use App\Helpers\Qs;
use App\Http\Requests\Subject\SubjectCreate;
use App\Http\Requests\Subject\SubjectUpdate;
use App\Repositories\MyClassRepo;
use App\Repositories\PolicyRepository;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $my_class, $user, $policy;

    public function __construct(MyClassRepo $my_class, UserRepo $user, PolicyRepository $policy)
    {
        $this->middleware('teamSA', ['except' => ['destroy',]]);
        $this->middleware('super_admin', ['only' => ['destroy',]]);

        $this->my_class = $my_class;
        $this->user = $user;
        $this->policy = $policy;
    }

    public function index()
    {
        $d['my_classes'] = $this->my_class->all();
        $d['class_types'] = $this->my_class->getTypes();
        $d['policy'] = $this->policy->all();
        return view('pages.support_team.policies.index', $d);
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
        $this->policy->create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function show(Policy $policy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function edit(Policy $policy)
    {
//        dd('asdfasfd');
        $id = $policy->id;

//        $d['c'] = $c = $this->my_class->find($id);
        $d['c'] = $c = $this->policy->find($id);
//dd($d['c']);

        return is_null($c) ? Qs::goWithDanger('policies.index') : view('pages.support_team.policies.edit', $d);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Policy $policy)
    {
        $data = $req->only(['policy']);
        $id = $policy->id;
        $this->policy->update($id, $data);
        return redirect()->route('policies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Policy $policy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Policy $policy)
    {
        $this->my_class->delete($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
