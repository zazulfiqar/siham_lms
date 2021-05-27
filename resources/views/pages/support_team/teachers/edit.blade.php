{{--{{dd($data)}}--}}
@extends('layouts.master')
@section('page_title', 'Edit Teacher')
@section('content')

    <div class="card">
        <div class="card-header bg-white header-elements-inline">
            {{--                <h6 id="ajax-title" class="card-title">Please fill The form Below To Edit record of {{ $data['tr']->name }}</h6>--}}
            <h6 id="" class="card-title">Please fill The form Below To Edit record of {{ $data['tr']->name }}</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        {{--        <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" data-reload="#ajax-title" action="{{ route('teachers.update', Qs::hash($data['tr']->id)) }}" data-fouc>--}}
        <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation " data-reload="#" action="{{ route('teachers.update', Qs::hash($data['tr']->id)) }}" data-fouc>
{{--        <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" data-reload="#ajax-title" action="{{ route('teachers.update', Qs::hash($data['tr']->id)) }}" data-fouc>--}}
            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation " data-reload="#" action="{{ route('teachers.update', Qs::hash($data['tr']->id)) }}" data-fouc>

            @csrf @method('PUT')
            <h6>Personal data</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Full Name: <span class="text-danger">*</span></label>
                            <input value="{{ $data['tr']->name }}" required type="text" name="name" placeholder="Full Name" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address: <span class="text-danger">*</span></label>
                            <input value="{{ $data['tr']->address }}" class="form-control" placeholder="Address" name="address" type="text" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email address: <span class="text-danger">*</span></label>
                            <input value="{{ $data['tr']->email  }}" type="email" name="email" class="form-control" placeholder="your@email.com">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Gender: <span class="text-danger">*</span></label>
                            <select class="select form-control" id="gender" name="gender" required data-fouc data-placeholder="Choose..">
                                <option value=""></option>
                                <option {{ ($data['tr']->gender  == 'Male' ? 'selected' : '') }} value="Male">Male</option>
                                <option {{ ($data['tr']->gender  == 'Female' ? 'selected' : '') }} value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Phone:</label>--}}
                    {{--                                <input value="{{ $data['tr']->phone  }}" type="text" name="phone" class="form-control" placeholder="" >--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Telephone:</label>--}}
                    {{--                                <input value="{{ $data['tr']->phone2  }}" type="text" name="phone2" class="form-control" placeholder="" >--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                </div>

                <div class="row">
                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label>Date of Birth:</label>--}}
                    {{--                                <input name="dob" value="{{ $data['tr']->dob  }}" type="text" class="form-control date-pick" placeholder="Select Date...">--}}

                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nal_id">Nationality: <span class="text-danger">*</span></label>
                            <select data-placeholder="Choose..." required name="nal_id" id="nal_id" class="select-search form-control">
                                <option value=""></option>
                                @foreach($data['nationals'] as $na)
                                    <option {{  ($data['tr']->nal_id  == $na->id ? 'selected' : '') }} value="{{ $na->id }}">{{ $na->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="state_id">State: <span class="text-danger">*</span></label>
                        <select onchange="getLGA(this.value)" required data-placeholder="Choose.." class="select-search form-control" name="state_id" id="state_id">
                            <option value=""></option>
                            @foreach($data['states'] as $st)
                                <option {{ ($data['tr']->state_id  == $st->id ? 'selected' : '') }} value="{{ $st->id }}">{{ $st->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="lga_id">LGA: <span class="text-danger">*</span></label>
                        <select required data-placeholder="Select State First" class="select-search form-control" name="lga_id" id="lga_id">
                            @if($data['tr']->lga_id)
                                @foreach($data['lga'] as $lg)
                                <option {{ ($data['tr']->lga_id  == $lg->id ? 'selected' : '') }} value="{{ $lg->id }}">{{ $lg->name }}</option>
                                @endforeach

                                {{--                                <option selected value="{{ $data['tr']->lga_id }}">{{ $data['tr']->lga->name}}</option>--}}
                            @endif
                        </select>
                    </div>


                    {{--                        <div class="col-md-6">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="bg_id">Blood Group: </label>--}}
                    {{--                                <select class="select form-control" id="bg_id" name="bg_id" data-fouc data-placeholder="Choose..">--}}
                    {{--                                    <option value=""></option>--}}
                    {{--                                    @foreach(App\Models\BloodGroup::all() as $bg)--}}
                    {{--                                        <option {{ ($data['tr']->bg_id  == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </select>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="d-block">Upload Passport Photo:</label>
                            <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted Images: jpeg, png. Max file size 2Mb</span>
                        </div>
                    </div>
                </div>

            </fieldset>

            <h6>Teacher Data</h6>
            <fieldset>
                <div class="row">
                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="my_class_id">Class: </label>--}}
                    {{--                                <select onchange="getClassSections(this.value)" name="my_class_id" required id="my_class_id" class="form-control select-search" data-placeholder="Select Class">--}}
                    {{--                                    <option value=""></option>--}}
                    {{--                                    @foreach($my_classes as $c)--}}
                    {{--                                        <option {{ $tr->my_class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>--}}
                    {{--                                        @endforeach--}}
                    {{--                                    </select>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="section_id">Section: </label>--}}
                    {{--                                <select name="section_id" required id="section_id" class="form-control select" data-placeholder="Select Section">--}}
                    {{--                                    <option value="{{ $tr->section_id }}">{{ $tr->section->name }}</option>--}}
                    {{--                                </select>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <div class="col-md-3">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="my_parent_id">Parent: </label>--}}
                    {{--                                <select data-placeholder="Choose..."  name="my_parent_id" id="my_parent_id" class="select-search form-control">--}}
                    {{--                                    <option  value=""></option>--}}
                    {{--                                    @foreach($data['parents'] as $p)--}}
                    {{--                                        <option {{ (Qs::hash($data['parents']->parent_id) == Qs::hash($p->id)) ? 'selected' : '' }} value="{{ Qs::hash($p->id) }}">{{ $p->name }}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </select>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="year_admitted">Joining Date / Admitted: </label>
                            <select name="joining_date" data-placeholder="Choose..." id="joining_date" class="select-search form-control">
                                <option value=""></option>
                                @for($y=date('Y', strtotime('- 10 years')); $y<=date('Y'); $y++)
                                    <option {{ ($data['tr']->joining_date == $y) ? 'selected' : '' }} value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Age:</label>
                            <input min="1" type="number" name="age" placeholder="Age" class="form-control" value="{{$data['tr']->age}}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Teaching Speciality:</label>
                            <input type="teaching_speciality" name="speciality" placeholder="Teaching Speciality" class="form-control" value="{{$data['tr']->speciality}}">
                        </div>
                    </div>
                </div>





                {{--                    <div class="row">--}}
                {{--                        <div class="col-md-6">--}}
                {{--                            <label for="dorm_id">Dormitory: </label>--}}
                {{--                            <select data-placeholder="Choose..."  name="dorm_id" id="dorm_id" class="select-search form-control">--}}
                {{--                                <option value=""></option>--}}
                {{--                                @foreach($data['dorms'] as $d)--}}
                {{--                                    <option {{ ($data['tr']->dorm_id == $d->id) ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>--}}
                {{--                                @endforeach--}}
                {{--                            </select>--}}

                {{--                        </div>--}}

                {{--                        <div class="col-md-6">--}}
                {{--                            <div class="form-group">--}}
                {{--                                <label>Dormitory Room No:</label>--}}
                {{--                                <input type="text" name="dorm_room_no" placeholder="Dormitory Room No" class="form-control" value="{{ $data['tr']->dorm_room_no }}">--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
            </fieldset>

        </form>
    </div>
@endsection
