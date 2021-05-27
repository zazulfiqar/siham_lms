@extends('layouts.master')
@section('page_title', 'Edit Assignment')
@section('content')

{{--    {{dd($assignments)}}--}}
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Assignment</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Edit your Uploaded Assignment</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            {{--                            <form class="" method="get" action="{{ route('exams.update',Qs::hash($exams->id)) }}" enctype="multipart/form-data">--}}
                            <form class="" method="post" action="{{ route('teacher_assignment.update',Qs::hash($assignments->id)) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')

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
                                                    {{ $assignments->course_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
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
                                                    {{ $assignments->class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Upload File Here
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="file" name="file" value="{{ $assignments->file }}"  type="text"
                                               class="form-control" placeholder="Course Topic">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Topic
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="topic" value="{{ $assignments->topic }}" required type="text"
                                               class="form-control" placeholder="Course Topic">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea  name="description" cols="70" rows="5">
                                            {{$assignments->description}}</textarea>
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
@endsection
