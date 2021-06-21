<?php

namespace App\Http\Controllers\SupportTeam;
use App\Models\frontHomepageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FrontHomepageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getRecordFrontHomeGallery=frontHomepageGallery::all();
        return view('pages.support_team.WebManagement.homepage.galleryList')->with('getRecordFrontHomeGallery', $getRecordFrontHomeGallery);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.support_team.WebManagement.homepage.galleryIndex');
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

        $this->validate($request,[
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
           ]);

        if($request->hasFile('photo'))
        {
            $file =$request->file('photo');   //file is the name of the html form input

            $new_image_name=time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/uploadsGalleryImage/',$new_image_name); //img is my directory that images go
            $request->path = $new_image_name; //path is the name of the colomn iin the  database where i save the photo so i can return it to the view

        }
        else{
            $new_image_name = 'No Image';
        }
        $data = new frontHomepageGallery();
        $data->fill($request->all());
        $data->photo =$new_image_name;
        $data->save();
        return \redirect('homepagegallery');


//        $path = "/tmp/uploads/".$request->input('document_file');
//        if ($request->input('document_file', true)) {
//            $document->addMedia(storage_path($path))->toMediaCollection('document_file');
//        }

        // return redirect()->route('admin.documents.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\frontHomepageGallery  $frontHomepageGallery
     * @return \Illuminate\Http\Response
     */
    public function show(frontHomepageGallery $frontHomepageGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\frontHomepageGallery  $frontHomepageGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(frontHomepageGallery $frontHomepageGallery,$id)
    {
        $getRecordFrontHomeGallery=frontHomepageGallery::findorfail($id);

        return view('pages.support_team.WebManagement.homepage.editgalleryList')->with('getRecordFrontHomeGallery', $getRecordFrontHomeGallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\frontHomepageGallery  $frontHomepageGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frontHomepageGallery $frontHomepageGallery,$id)
    {

        $getdata=frontHomepageGallery::where('id',$id)->get();
      $imageget=$getdata[0]->photo;

        $data = $request->except(['_token', '_method' ]);

        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');   //file is the name of the html form input

            $image=$new_image_name=time().'-'.$file->getClientOriginalName();
            $file->move('uploadsGalleryImage/',$new_image_name);
            // $file->move(public_path().'/uploadsGalleryImage/',$new_image_name); //img is my directory that images go
            $request->path=$new_image_name; //path is the name of the colomn iin the  database where i save the photo so i can return it to the view

        }
        else{
            $image=$imageget;
        }



        DB::table('front_homepage_galleries')
        ->where('id', $id)
        ->update(['name' => "$request->name", 'content' => "$request->content", 'photo' => "$image"]);
        return redirect('homepagegallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\frontHomepageGallery  $frontHomepageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(frontHomepageGallery $frontHomepageGallery,$id)
    {

        $blogId=frontHomepageGallery::findorfail($id);
        $blogId->delete();

        // $this->webfront->deleteFrontBlog($id);
        return back()->with('flash_success', __('msg.del_ok'));
    }
}
