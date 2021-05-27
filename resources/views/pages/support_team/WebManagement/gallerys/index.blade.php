@extends('layouts.master')
@section('page_title', 'Manage Web Banner Images')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Web Banner Images </h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-section" class="nav-link active" data-toggle="tab">Upload Testimonial
                    </a></li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-section">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="" method="post" action="{{ route('frontgallery.store') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        Home Page Banner

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="home_header_image"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        Course Banner

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="course_header_image"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        Pricing Banner

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="price_header_image"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        Testimonial Banner

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="testimonial_header_image"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        Blogs Banner

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="blog_header_image"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        FAQ Banner

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="faq_header_image"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">
                                        Contact us  Banner

                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input value="{{ old('photo') }}" accept="image/*" type="file" name="contact_header_image"
                                               class="form-input-styled" data-fouc>
                                        <span
                                            class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>

                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit form <i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{--Section List Ends--}}

@endsection
