@extends('layouts.master')
@section('page_title', 'Edit Lecture')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Lecture</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
{{--        {{dd($lectures)}}--}}
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Edit your Uploaded Lecture</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('teacher.paper.update',Qs::hash($papers->id)) }}" enctype="multipart/form-data">
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
                                                    {{ $papers->course_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
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
                                                    {{ $papers->class_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
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
                                                    {{ $papers->teacher_id == $t->user_id ? 'selected' : '' }} value="{{ $t->user_id }}">{{ $t->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">time
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="time" value="{{ $papers->time }}"
                                               type="datetime-local"
                                               class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Topic
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="topic" value="{{ $papers->topic }}" required type="text"
                                               class="form-control" placeholder="Course Topic">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">Description
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <textarea  name="description" >
                                            {{$papers->description}}</textarea>
                                    </div>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit form <i
                                            class="icon-papersplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
