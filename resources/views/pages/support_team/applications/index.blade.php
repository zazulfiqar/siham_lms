@extends('layouts.master')
@section('page_title', 'Manage Complains')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Complains</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Complains</a></li>
                {{-- <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Complains</a></li> --}}
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Student Name</th>
                            <th>Emails</th>
                            <th>Subject</th>
                            <th>Cell</th>
                            {{--                                <th>Complains</th>--}}
                            <th>Status</th>
                            {{--                                <th>Response</th>--}}
                            @if(Qs::userIsTeamSA())
                                {{--                                <th>Response</th>--}}
                            @endif


                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fetchapplication as $fetch)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fetch->users->name }}</td>
                                <td>{{ $fetch->email }}</td>
                                <td>{{ $fetch->subject }}</td>
                                <td>{{ $fetch->cell }}</td>
                                {{--                                    <td><textarea rows="2" cols="10">{{ $fetch->application }}</textarea></td>--}}
                                @if($fetch->status == 0 )
                                    <td>Pending</td>
                                @elseif($fetch->status == 1 )
                                    <td>Responded</td>
                                @endif
                                {{--                                    <td><textarea rows="2" cols="10">{{ $fetch->response }}</textarea></td>--}}
                                @if(Qs::userIsTeamSA())
                                    {{--                                   <td>--}}
                                    {{--                                       <input class="form-control" type="text" name="response" placeholder="Give Your response here" />--}}
                                    {{--                                        <input type="submit" name="btnSubmit" value="Add Response" class="btn btn-success" />--}}
                                    {{--                                    </td>--}}
                                @endif
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                @if(Qs::userIsTeamSA())
                                                    <a href="{{ route('application.manage_complain',Qs::hash($fetch->id)) }}" class="dropdown-item"><i class="icon-add"></i> Add Response</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="new-class">
                    <div class="row">
                        <div class="col-md-12">
                            {{--                            <div class="alert alert-info border-0 alert-dismissible">--}}
                            {{--                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>--}}

                            {{--                                <span>When a class is created, a Section will be automatically created for the class, you can edit it or add more sections to the class at <a target="_blank" href="{{ route('sections.index') }}">Manage Sections</a></span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <form enctype="multipart/form-data"  method="post" action="{{ route('students.general_app_storeComplains') }}">
                                @csrf
                                @method('post')


                                <div class="form-group row">
                                    <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">To: </label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class Type" class="form-control select" name="std_id" id="class_type_id">
                                            <option selected disabled value="">--- Select Any ---</option>
                                            <option>HR</option>
                                            <option>Admin</option>
                                            <option>Faculty</option>
                                            <option>Student Relation</option>
                                            <option>Accounts</option>
                                            <option>Examination</option>
                                            <option>Others</option>

                                            {{--                                            @foreach($studentName as $stName)--}}
                                            {{--                                                <option {{ old('class_type_id') == $stName->id ? 'selected' : '' }} value="{{ $stName->id }}">{{ $stName->name }}</option>--}}
                                            {{--                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Email</label>
                                <div class="col-lg-9">
                                    <input name="email" required type="text" class="form-control" placeholder="Email">
                                    {{--                                        <select required data-placeholder="Select Class Type" class="form-control select" name="cource_id" id="class_type_id">--}}
                                    {{--                                            @foreach($courcesName as $cName)--}}
                                    {{--                                                <option {{ old('class_type_id') == $cName->id ? 'selected' : '' }} value="{{ $cName->id }}">{{ $cName->name }}</option>--}}
                                    {{--                                            @endforeach--}}
                                    {{--                                        </select>--}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="class_type_id" class="col-lg-3 col-form-label font-weight-semibold">Subject</label>
                                <div class="col-lg-9">

                                    <select required data-placeholder="Select Subject" class="form-control select" name="subject" id="class_type_id">
                                        {{-- @foreach($subjectsName as $sName)
                                            <option {{ old('class_type_id') == $sName->id ? 'selected' : '' }} value="{{ $sName->id }}">{{ $sName->name }}</option>
                                        @endforeach --}}
                                        <option selected disabled value="">--- Select Any ---</option>
                                        <option>Course Registration</option>
                                        <option>Course Drop</option>
                                        <option>Semester Drop</option>
                                        <option>Other</option>
                                        {{--                                        <select required data-placeholder="Select Class Type" class="form-control select" name="subject_id" id="class_type_id">--}}
                                        {{--                                            @foreach($subjectsName as $sName)--}}
                                        {{--                                                <option {{ old('class_type_id') == $sName->id ? 'selected' : '' }} value="{{ $sName->id }}">{{ $sName->name }}</option>--}}
                                        {{--                                            @endforeach--}}

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">Cell <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="number" name="cell" required type="text" class="form-control" placeholder="Cell number">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label font-weight-semibold">attechemt <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="file" name="photo"  required type="text" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">Application <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <textarea class="form" cols="50" rows="5" name="application"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
