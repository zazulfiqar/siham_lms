@extends('layouts.master')
@section('page_title', 'Upload Assignment Here')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Exam</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add New
                        Assignment</a>
                </li>
                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Assignment</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('teacher_assignment.store') }}"
                                  enctype='multipart/form-data'>
                                @csrf
                                @method('post')

                                <div class="form-group row">

                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                        Term <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Course" class="form-control select"
                                                name="term" id="term">
                                            <option value="First Term">First Term</option>
                                            <option value="Second Term">Second Term</option>
                                            <option value="Third Term">Third Term</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                        Course <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Course" class="form-control select"
                                                name="course_id" id="course_id">
                                            <option value=""></option>
                                            @foreach($courses as $c)
                                                <option
                                                    {{ old('course_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="class_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                        Class <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class" class="form-control select"
                                                name="class_id" id="class_id">
                                            <option value=""></option>
                                            @foreach($my_classes as $c)
                                                <option
                                                    {{ old('class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'super_admin')
                                    <div class="form-group row">
                                        <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                            Teacher <span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <select required data-placeholder="Select Teacher"
                                                    class="form-control select"
                                                    name="teacher_id" id="teacher_id">
                                                <option value=""></option>
                                                @foreach($teachers as $t)
                                                    <option
                                                        {{ old('teacher_id') == $t->id ? 'selected' : '' }} value="{{ $t->id }}">{{ $t->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @else
                                @endif


                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Upload File
                                        Here
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="file" type="file"
                                               class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Topic
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="topic" value="{{ old('topic') }}" required type="text"
                                               class="form-control" placeholder="Course Topic">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea name="description" cols="70" rows="5"></textarea>
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

                <div class="tab-pane fade" id="manage-course">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th style="width: 10%">S/N</th>
                            <th>Topic</th>
                            <th>Course</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>File</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assignments as $assignment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td> @if(isset($assignment->topic))
                                        {{$assignment->topic}}
                                    @else
                                        not assign
                                    @endif</td>

                                <td>
                                    @if(isset($assignment->courses->name))
                                        {{$assignment->courses->name}}
                                    @else not assign
                                    @endif</td>
                                <td>
                                    @if(isset($assignment->class->name))
                                        {{$assignment->class->name}}
                                    @else
                                        not assign
                                    @endif
                                </td>

                                <td>  @if(isset($assignment->term)) {{$assignment->term}} @else not assign @endif</td>

                                <td>  @if(isset($assignment->file))
                                        <a href="{{asset('siham_lms/storage/app/public/'.$assignment->file)}}" target="_blank">Download
                                            file</a>
                                    @else
                                        No file
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                {{--                                                edit--}}
                                                @if(Qs::userIsTeamSAT())
                                                    <a href="{{ route('teacher_assignment.edit', Qs::hash($assignment->id)) }}"
                                                       class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                @endif
                                                {{--                                                Delete--}}
                                                @if(Qs::userIsTeamSAT())
                                                    <a id="{{ $assignment->id }}"
                                                       href="{{ route('teacher_assignment.show', Qs::hash($assignment->id)) }}"
                                                       class="dropdown-item"><i class="icon-trash"></i> showDelete</a>

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
                {{--                @endforeach--}}
            </div>


        </div>
    </div>
    {{--subject List Ends--}}
@endsection
