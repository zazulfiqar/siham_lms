@extends('layouts.master')
@section('page_title', 'Student Policies')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Student Policies</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">


            <div class="row">


                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card flex-row flex-wrap">
                        <div class="card-footer w-100 text-muted">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>   Privacy Policy
                        </div>
                        @foreach($policies as $policysingle)
                            <div class="card-body">
                                <p>{{  $policysingle->policy }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">
                            {{--                            <div class="alert alert-info border-0 alert-dismissible">--}}
                            {{--                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>--}}

                            {{--                                <span>When a class is created, a Section will be automatically created for the class, you can edit it or add more sections to the class at <a target="_blank" href="{{ route('sections.index') }}">Student Sections</a></span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{--                            <form class="ajax-store" method="post" action="{{ route('policies.store') }}">--}}

                            <form class="" method="post" action="{{ route('policies.store') }}">

                                @csrf
                                <div class="form-group row">
                                    <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Role
                                        Type</label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class Type"
                                                class="form-control select" name="role_type" id="role_type">
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="staff">Staff</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Policy Description<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        {{--                                        <input name="name" value="{{ old('name') }}" required type="text"--}}
                                        {{--                                               class="form-control" placeholder="Name of Class">--}}
                                        <textarea id="" name="policy" rows="10" cols="120"></textarea>


                                    </div>
                                </div>


                                <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
