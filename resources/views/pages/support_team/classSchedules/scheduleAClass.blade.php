@extends('layouts.master')
@section('page_title', 'Schedule A Class')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Classes</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add New Class</a>
                </li>

                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Classes</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('teacher.scheduleAClass.store') }}">
                                @csrf
                                @method('post')

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

                                <div class="form-group row">
                                    <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                        Teacher <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Teacher" class="form-control select"
                                                name="teacher_id" id="teacher_id">
                                            <option value=""></option>
                                            @foreach($teachers as $t)
                                                <option
                                                    {{ old('teacher_id') == $t->id ? 'selected' : '' }} value="{{ $t->id }}">{{ $t->name }}</option>
                                            @endforeach
                                        </select>
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
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Time Slot
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="time_slot" name="time" value="{{ old('time_slot') }}" required
                                               type="text" class="form-control" placeholder="Time Slot">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Zoom Link
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="zoom_link" name="zoom_link" value="{{ old('zoom_link') }}" required
                                               type="text" class="form-control" placeholder="Zoom Link">
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
                            <th>S/N</th>
                            <th>Course</th>
                            <th>Teacher</th>
                            <th>Time</th>
                            <th>Zoom Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedule as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if(isset($s->courses->name))

                                    <td>{{ $s->courses->name }} </td>
                                @else
                                    <td>Course </td>
                                @endif

                                @if(isset($s->teachers->name) )
                                    <td>{{ $s->teachers->name }} </td>
                                @else
                                    <td>teacher not assign</td>

                                @endif

                                <td>{{ $s->time }} </td>

                                <td><a target="_blank" href="{{ $s->zoom_link }}">{{ $s->zoom_link }} </a></td>

                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                {{--                                                                                                        edit--}}
                                                {{--                                                @if(Qs::userIsTeamSA())--}}
                                                <a href="{{ route('teacher.scheduleAClass.edit', Qs::hash($s->id)) }}"
                                                   class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                {{--                                                @endif--}}
                                                {{--                                                                                                        Delete--}}
                                                {{--                                                @if(Qs::userIsSuperAdmin())--}}
                                                <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"
                                                   class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ $s->id }}"
                                                      action="{{ route('teacher.scheduleAClass.destroy', Qs::hash($s->id)) }}"
                                                      class="hidden">@csrf @method('post')</form>
                                                {{--                                                @endif--}}
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
