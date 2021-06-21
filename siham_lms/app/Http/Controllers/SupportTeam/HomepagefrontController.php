<?php

namespace App\Http\Controllers\SupportTeam;
use App\Http\Controllers\Controller;
use App\Models\homepagefront;
use Illuminate\Http\Request;

class HomepagefrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRecordFrontHome=homepagefront::all();
        // dd($getRecordFrontHome);
        // return view('pages.support_team.WebManagement.homepage.index');
        return view('pages.support_team.WebManagement.homepage.index')->with('getRecordFrontHome', $getRecordFrontHome);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\homepagefront  $homepagefront
     * @return \Illuminate\Http\Response
     */
    public function show(homepagefront $homepagefront)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\homepagefront  $homepagefront
     * @return \Illuminate\Http\Response
     */
    public function edit(homepagefront $homepagefront,$id)
    {

        // Flight::findOrFail($id);
      //        dd('asdf');
      $d['homepagefront'] = $s =homepagefront::findOrFail($id);

    //   dd($d['homepagefront']);
              return view('pages.support_team.WebManagement.homepage.edit', $d);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\homepagefront  $homepagefront
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, homepagefront $homepagefront,$id)
    {


$data = $request->except(['_token', '_method' ]);

unset($data['_token']);
        $isUpdated = homepagefront::where('id',$id)->update($data);
        return redirect('homepage');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\homepagefront  $homepagefront
     * @return \Illuminate\Http\Response
     */
    public function destroy(homepagefront $homepagefront)
    {
        //
    }
}
