@extends('layouts.master')
@section('page_title', 'Edit Front Testimonials')
@section('content')
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="" method="post" action="{{ route('fronttestimonial.update', $testimonials->id) }}" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">testimonial
                                Title
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control" value="{{$testimonials->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                User Image
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo"
                                       class="form-input-styled" data-fouc>
                                <span
                                    class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">testimonial Description
                                <span
                                    class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <textarea id="" name="description" rows="4" cols="98">{{$testimonials->description}}</textarea>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Section Edit Ends--}}

@endsection
