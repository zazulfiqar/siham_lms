<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="CJ Inspired">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" type="text/css">

{{-- Custom App CSS--}}
<link href=" {{ asset('assets/css/qs.css') }}" rel="stylesheet" type="text/css">

{{--   Core JS files --}}
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }} "></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }} "></script>
    <title> @yield('page_title') | {{ config('app.name') }} </title>


</head>

@include('partials.inc_bottom')
@yield('scripts')



<body class="innerpages body_bg">
    <!-- Header Start -->
    @include('frontend.layout.head')
    @include('frontend.layout.header');


    <div class="innerBanner">
        <img src="{{asset('images/Bannar-1.jpg')}}" class="img-responsive" alt="courses-Banner">
        <div class="innerBannerOverlay">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 centerCol">
              <h1>Register</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="register_section">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12 center">
              <div class="login_popup">
                <div class="login_popupForm">
                  <h2 data-aos="fade-down">Register  Now</h2>
                  <P data-aos="fade-down">Choose from 130,000 online video courses with new additions published every month</P>


                  <form id="" method="post" enctype="multipart/form-data" class="wizard-form steps-validation"
                  action="{{ route('teachers.store') }}" data-fouc>
            @csrf

            <fieldset>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Full Name: <span class="text-danger">*</span></label>
                            <input value="{{ old('name') }}" required type="text" name="name" placeholder="Full Name"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Address: <span class="text-danger">*</span></label>
                            <input value="{{ old('address') }}" class="form-control" placeholder="Address"
                                   name="address" type="text" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Email address: </label>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                   placeholder="Email Address">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="gender">Gender: <span class="text-danger">*</span></label>
                            <select class="selectBoxFront select form-control" id="gender" name="gender" required data-fouc
                                    data-placeholder="Choose..">
                                <option value="">Choose Gender</option>
                                <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female
                                </option>
                            </select>
                        </div>
                    </div>

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Phone:</label>--}}
                    {{--                                <input value="{{ old('phone') }}" type="text" name="phone" class="form-control" placeholder="" >--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Telephone:</label>--}}
                    {{--                                <input value="{{ old('phone2') }}" type="text" name="phone2" class="form-control" placeholder="" >--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                </div>

                <div class="row">
                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Date of Birth:</label>--}}
                    {{--                                <input name="dob" value="{{ old('dob') }}" type="text" class="form-control date-pick" placeholder="Select Date...">--}}

                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                            <select data-placeholder="Choose..." required name="nal_id" id="nal_id"
                                    class="selectBoxFront select-search form-control">
                                <option value="">Choose Nationality</option>
                                @foreach($nationals as $nal)
                                    <option
                                        {{ (old('nal_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="state_id">State: <span class="text-danger">*</span></label>
                        <select onchange="getLGA(this.value)" required data-placeholder="Choose.."
                                class="selectBoxFront select-search form-control" name="state_id" id="state_id">
                            <option value="">Choose State</option>
                            @foreach($states as $st)
                                <option
                                    {{ (old('state_id') == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    {{--                        <div class="col-md-6">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="bg_id">Blood Group: </label>--}}
                    {{--                                <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">--}}
                    {{--                                    <option value=""></option>--}}
                    {{--                                    @foreach(App\Models\BloodGroup::all() as $bg)--}}
                    {{--                                        <option {{ (old('bg_id') == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </select>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <label for="lga_id">LGA: <span class="text-danger">*</span></label>
                        <select  required data-placeholder="Select State First" class="selectBoxFront select-search form-control"
                                name="lga_id" id="lga_id">
                            <option value=""> Choose LGA</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <div class="form-group">
                            <label class="d-block">Upload Passport Photo:</label>
                            <input  value="{{ old('photo') }}" accept="image/*" type="file" name="photo"
                                   class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                        </div>
                    </div>
                </div>

            </fieldset>


            <fieldset>
                <div class="row">

{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="my_class_id">Class: <span class="text-danger">*</span></label>--}}
{{--                            <select onchange="getClassSections(this.value)" data-placeholder="Choose..." required--}}
{{--                                    name="my_class_id" id="my_class_id" class="select-search form-control">--}}
{{--                                <option value=""></option>--}}
{{--                                @foreach($my_classes as $c)--}}
{{--                                    <option--}}
{{--                                        {{ (old('my_class_id') == $c->id ? 'selected' : '') }} value="{{ $c->id }}">{{ $c->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="section_id">Section: <span class="text-danger">*</span></label>--}}
{{--                            <select data-placeholder="Select Class First" required name="section_id" id="section_id"--}}
{{--                                    class="select-search form-control">--}}
{{--                                <option--}}
{{--                                    {{ (old('section_id')) ? 'selected' : '' }} value="{{ old('section_id') }}">{{ (old('section_id')) ? 'Selected' : '' }}</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="my_parent_id">Parent: </label>--}}
{{--                            <select data-placeholder="Choose..." name="my_parent_id" id="my_parent_id"--}}
{{--                                    class="select-search form-control">--}}
{{--                                <option value=""></option>--}}
{{--                                @foreach($parents as $p)--}}
{{--                                    <option--}}
{{--                                        {{ (old('my_parent_id') == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="year_admitted">joining Date / Admitted: <span class="text-danger">*</span></label>
                            <select data-placeholder="Choose..." required name="year_admitted" id="year_admitted"
                                    class="selectBoxFront select-search form-control">
                                <option value=""> Choose joining Date / Admitted</option>
                                @for($y=date('Y', strtotime('- 10 years')); $y<=date('Y'); $y++)
                                    <option
                                        {{ (old('year_admitted') == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <label for="dorm_id">Dormitory: </label>--}}
                    {{--                            <select data-placeholder="Choose..."  name="dorm_id" id="dorm_id" class="select-search form-control">--}}
                    {{--                                <option value=""></option>--}}
                    {{--                                @foreach($dorms as $d)--}}
                    {{--                                    <option {{ (old('dorm_id') == $d->id) ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                            </select>--}}

                    {{--                        </div>--}}

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Dormitory Room No:</label>--}}
                    {{--                                <input type="text" name="dorm_room_no" placeholder="Dormitory Room No" class="form-control" value="{{ old('dorm_room_no') }}">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Sport House:</label>--}}
                    {{--                                <input type="text" name="house" placeholder="Sport House" class="form-control" value="{{ old('house') }}">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Age:</label>
                            <input min="1" type="number" name="age" placeholder="Age" class="form-control selectBoxFront"
                                   value="{{ old('age') }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Teaching Speciality:</label>
                            <input  type="teaching_speciality" name="teaching_speciality" placeholder="teaching_speciality" class="selectBoxFront form-control"
                                   value="{{ old('teaching_speciality') }}">
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="600">
                  <input type="submit" value="Register Now">
                </div>
              </div>

    </div>
  </div>
</div>
</div>
</div>
</div>

        </form>
    </div>
    @include('frontend.layout.footer');
    <!-- Js Files Start -->
    <script src="{{asset('js/allmix.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/aos.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
{{-- @endsection --}}

