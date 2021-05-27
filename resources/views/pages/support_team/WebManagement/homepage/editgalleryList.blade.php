
@extends('layouts.master')
@section('page_title', 'Add Gallery')
@section('content')
    <div class="card">

        <br>
        <form class="" method="post" action="{{ route('homepagegallery.update', $getRecordFrontHomeGallery->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <fieldset>
                <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title<span class="text-danger">*</span></label>
                            <input required type="text" name="name" value="{{ $getRecordFrontHomeGallery->name }}" placeholder="Topic"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Content<span class="text-danger">*</span></label>
                            <input  class="form-control" value="{{ $getRecordFrontHomeGallery->content }}" placeholder="Content"
                                   name="content" type="text" required>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="d-block">Upload Passport Photo:</label>
                            <input  accept="image/*" type="file" name="photo"  value="{{ $getRecordFrontHomeGallery->photo}}"
                                   class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                        <br>
                    </div>

                </div>

            </div>
            </fieldset>




        </form>
    </div>
@endsection
