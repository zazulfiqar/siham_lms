@extends('layouts.master')
@section('page_title', 'Edit Course Content')
@section('content')
{{--{{dd($pricings)}}--}}
    <div class="card">
{{--        <div class="card-header header-elements-inline">--}}
{{--            <h6 class="card-title">Edit Section of {{ $s->my_class->name }}</h6>--}}
{{--            {!! Qs::getPanelOptions() !!}--}}
{{--        </div>--}}

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
{{--                    {{$pricings->id}}--}}
                    <form class="" method="post" action="{{ route('frontpricing.update', $pricings->id) }}">
                        @csrf @method('PUT')


                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Title
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text"  class="form-control" name="title" value="{{$pricings->title}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Course
                                Duration
                                <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text"  class="form-control" name="course_duration" value="{{$pricings->course_duration}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">price
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text"  class="form-control" name="price" value="{{$pricings->price}}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">description
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text"  class="form-control" name="description" value="{{$pricings->description}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_One
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text"  class="form-control" name="feature_one" value="{{$pricings->feature_one}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Two
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="feature_two"  class="form-control" value="{{$pricings->feature_two}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Three
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="feature_three"  class="form-control" value="{{$pricings->feature_three}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Four
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="feature_four"  class="form-control" value="{{$pricings->feature_four}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">feature_Five
                                <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input type="text" name="feature_five"  class="form-control" value="{{$pricings->feature_five}}">

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
