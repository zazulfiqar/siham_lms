<?php

namespace App\Http\Controllers\SupportTeam;
use App\Http\Controllers\Controller;
use App\Models\frontHpmepageVideo;
use Illuminate\Http\Request;
use DB;
class FrontHomepageVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getRecordFrontHomevideo=frontHpmepageVideo::all();
        return view('pages.support_team.WebManagement.homepage.homepagevideos.store')->with('getRecordFrontHomeGallery', $getRecordFrontHomevideo);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.support_team.WebManagement.homepage.homepagevideos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
           ]);

        if($request->hasFile('photo'))
        {
            $file =$request->file('photo');   //file is the name of the html form input

            $new_image_name=time().'-'.$file->getClientOriginalName();
            $file->move('uploadsVideoImage/',$new_image_name);  //img is my directory that images go
            $request->path = $new_image_name; //path is the name of the colomn iin the  database where i save the photo so i can return it to the view

        }
        else{
            $new_image_name = 'No Image';
        }
        $data = new frontHpmepageVideo();
        $data->fill($request->all());
        $data->photo =$new_image_name;
        $data->save();
        return \redirect('homepagevideo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\frontHpmepageVideo  $frontHpmepageVideo
     * @return \Illuminate\Http\Response
     */
    public function show(frontHpmepageVideo $frontHpmepageVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\frontHpmepageVideo  $frontHpmepageVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(frontHpmepageVideo $frontHpmepageVideo,$id)
    {

            $getRecordFrontHomeGallery=frontHpmepageVideo::findorfail($id);

            return view('pages.support_team.WebManagement.homepage.homepagevideos.edit')->with('getRecordFrontHomeGallery', $getRecordFrontHomeGallery);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\frontHpmepageVideo  $frontHpmepageVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontHpmepageVideo $frontHpmepageVideo,$id)
    {
        $getdata=frontHpmepageVideo::where('id',$id)->get();
        $imageget=$getdata[0]->photo;

          $data = $request->except(['_token', '_method' ]);

          if($request->hasFile('photo'))
          {
              $file = $request->file('photo');   //file is the name of the html form input

              $image=$new_image_name=time().'-'.$file->getClientOriginalName();
              $file->move('uploadsVideoImage/',$new_image_name);
              // $file->move(public_path().'/uploadsGalleryImage/',$new_image_name); //img is my directory that images go
              $request->path=$new_image_name; //path is the name of the colomn iin the  database where i save the photo so i can return it to the view

          }
          else{
              $image=$imageget;
          }

          DB::table('front_hpmepage_videos')
          ->where('id', $id)
          ->update(['name' => "$request->name", 'content' => "$request->content", 'youtubeurl' => "$request->youtubeurl" , 'checkWebsite' => "$request->checkWebsite", 'photo' => "$image"]);
          return redirect('homepagevideo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\frontHpmepageVideo  $frontHpmepageVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(frontHpmepageVideo $frontHpmepageVideo,$id)
    {
        $blogId=frontHpmepageVideo::findorfail($id);
        $blogId->delete();

        // $this->webfront->deleteFrontBlog($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
