@extends('layouts.master')
@section('page_title', 'Home Page Edit')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Home Page</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">


            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-section">
                    <div class="row">
                        <div class="col-md-6">


                                <form class="" method="post" action="{{ route('homepage.update', $homepagefront->id) }}" enctype="multipart/form-data">
                                    @csrf @method('PUT')


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Banner Text
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="banner_text" value="{{ $homepagefront->banner_text }}" rows="2" cols="120">{{ $homepagefront->banner_text }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Subjects Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="subjects_topic" value="{{ $homepagefront->subjects_topic }}" rows="2" cols="120">{{ $homepagefront->subjects_topic }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Subjects Text
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="subjects_text" value="{{ $homepagefront->subjects_text }}" rows="2" cols="120">{{ $homepagefront->subjects_text }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_topic" value="{{ $homepagefront->learn_anywhere_topic }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_topic }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Content
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_text" value="{{ $homepagefront->learn_anywhere_text }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_text }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Card 1 Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_card_topic1" value="{{ $homepagefront->learn_anywhere_card_topic1 }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_card_topic1 }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Card 1 Content
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_card_text1" value="{{ $homepagefront->learn_anywhere_card_text1 }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_card_text1 }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Card 2 Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_card_topic2" value="{{ $homepagefront->learn_anywhere_card_topic2 }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_card_topic2 }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Card 2 Content
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_card_text2" value="{{ $homepagefront->learn_anywhere_card_text2 }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_card_text2 }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Card 3 Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_card_topic3" value="{{ $homepagefront->learn_anywhere_card_topic3 }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_card_topic3 }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Learn Anywhere Card 3 Text
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="learn_anywhere_card_text3" value="{{ $homepagefront->learn_anywhere_card_text3 }}" rows="2" cols="120">{{ $homepagefront->learn_anywhere_card_text3 }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Pricing Content
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="pricing_content" value="{{ $homepagefront->pricing_content }}" rows="2" cols="120">{{ $homepagefront->pricing_content }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Testimonial Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="testimonials" value="{{ $homepagefront->testimonials }}" rows="2" cols="120">{{ $homepagefront->testimonials }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Faq Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="faq_topic" value="{{ $homepagefront->faq_topic }}" rows="2" cols="120">{{ $homepagefront->faq_topic }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Faq Content
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="faq_content" value="{{ $homepagefront->faq_content }}" rows="2" cols="120">{{ $homepagefront->faq_content }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Contact Topic
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="contact_topic" value="{{ $homepagefront->contact_topic }}" rows="2" cols="120">{{ $homepagefront->contact_topic }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Contact content
                                         <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea id=""   name="contact_content" value="{{ $homepagefront->contact_content }}" rows="2" cols="120">{{ $homepagefront->contact_content }}</textarea>
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
