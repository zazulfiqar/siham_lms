@extends('layouts.master')
@section('page_title', 'Manage Courses')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Courses</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add Course</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            {{--                            <form class="ajax-store" method="post" action="{{ route('courses.store') }}">--}}
                            <form class="" method="post" action="{{ route('courses.update',$course->id) }}">
                                @csrf
                                @method('put')

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Course Name
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="name" name="name" value="{{ $course->name }}" required type="text"
                                               class="form-control" placeholder="Name of Course">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Course Code
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="code" value="{{ $course->code }}" required type="text"
                                               class="form-control" placeholder="Course Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Course
                                        Description <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="description" name="description" value="{{ $course->description }}"
                                               required type="text" class="form-control"
                                               placeholder="Course Description">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                        Class <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required class="form-control select"
                                                name="my_class_id" id="my_class_id">
                                            @foreach($my_classes as $c)
                                                <option
                                                    {{ $c->id == $course->my_class_id  ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
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
                                            @foreach($teachers as $t)
                                                <option
                                                    {{ $course->teacher_id == Qs::hash($t->id) ? 'selected' : '' }} value="{{ Qs::hash($t->id) }}">{{ $t->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Time Slot
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="time_slot" name="time_slot" value="{{ $course->time_slot }}" required
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
            </div>
        </div>
    </div>
    {{--subject List Ends--}}
@endsection
