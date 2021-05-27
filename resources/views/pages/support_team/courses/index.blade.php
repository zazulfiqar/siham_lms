@extends('layouts.master')
@section('page_title', 'Manage Courses')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Courses</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add Course</a>
                </li>

                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Course</a>
                </li>

                {{--                <li class="nav-item ">--}}
                {{--                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Courses</a>--}}
                {{--                    --}}{{--                    <div class="dropdown-menu dropdown-menu-right">--}}
                {{--                    --}}{{--                        @foreach($subjects as $s)--}}
                {{--                    --}}{{--                            <a href="#s{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $s->name }}</a>--}}
                {{--                    <a href="#s{{ $s->id }}" class="dropdown-item" data-toggle="tab">manage</a>--}}

                {{--                    --}}{{--                        @endforeach--}}
                {{--                    --}}{{--                    </div>--}}
                {{--                </li>--}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            {{--                            <form class="ajax-store" method="post" action="{{ route('courses.store') }}">--}}
                            <form class="" method="post" action="{{ route('courses.store') }}">
                                @csrf
                                @method('post')

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Course Name
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="name" name="name" value="{{ old('name') }}" required type="text"
                                               class="form-control" placeholder="Name of Course">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Course Code
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="code" value="{{ old('code') }}" required type="text"
                                               class="form-control" placeholder="Course Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Course
                                        Description <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="description" name="description" value="{{ old('description') }}"
                                               required type="text" class="form-control"
                                               placeholder="Course Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                        Class <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class" class="form-control select"
                                                name="my_class_id" id="my_class_id">
                                            <option value=""></option>
                                            @foreach($my_classes as $c)
                                                <option
                                                    {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="teacher_id" class="col-lg-3 col-form-label font-weight-semibold">Teacher
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Teacher"
                                                class="form-control select-search" name="teacher_id" id="teacher_id">
                                            <option value=""></option>
                                            @foreach($teachers as $t)
                                                <option
                                                    {{ old('teacher_id') == Qs::hash($t->id) ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Time Slot
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="time_slot" name="time_slot" value="{{ old('time_slot') }}" required
                                               type="text" class="form-control" placeholder="Time Slot">
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


                {{--                                                            {{$s->name}}--}}
                <div class="tab-pane fade" id="manage-course">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course Name</th>
{{--                            <th>Teacher</th>--}}
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->name }} </td>
{{--                                <td>{{ $c->teachers->name }} </td>--}}
                                <td>{{ $c->description }} </td>

                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                {{--                                                                                                        edit--}}
                                                @if(Qs::userIsTeamSA())
                                                    <a href="{{ route('courses.edit', $c->id) }}"
                                                       class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                       <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#"
                                                       class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ $c->id }}"
                                                          action="{{ route('courses.destroy', $c->id) }}"
                                                          class="hidden">@csrf @method('delete')</form>
                                                @endif
                                                {{--                                                                                                        Delete--}}
                                                <!--@if(Qs::userIsSuperAdmin())-->
                                                <!--    <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#"-->
                                                <!--       class="dropdown-item"><i class="icon-trash"></i> Delete</a>-->
                                                <!--    <form method="post" id="item-delete-{{ $c->id }}"-->
                                                <!--          action="{{ route('courses.destroy', $c->id) }}"-->
                                                <!--          class="hidden">@csrf @method('delete')</form>-->
                                                <!--@endif-->
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
