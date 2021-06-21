@extends('layouts.master')
@section('page_title', 'Create Paper')
@section('content')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Paper</h6>
            {!! Qs::getPanelOptions() !!}
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-course" class="nav-link active" data-toggle="tab">Add New Paper</a>
                </li>

                <li class="nav-item"><a href="#manage-course" class="nav-link" data-toggle="tab">Manage Paper</a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-course">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('teacher.paper.store') }}"
                                  enctype='multipart/form-data'>
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

                                {{--                                @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'super_admin')--}}
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
                                {{--                                @else--}}
                                {{--                                @endif--}}


                                <div class="form-group row">
                                    <label for="name" class="col-lg-3 col-form-label font-weight-semibold">time
                                        <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input id="code" name="time" value="{{ old('time') }}" required
                                               type="datetime-local"
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
                            <th>S/N</th>
                            <th>Course</th>
                            <th>Topic</th>

                            <th>Description</th>
                            <th>Paper Id</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($papers as $paper)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                @if(isset($paper->courses->name))
                                <td>{{$paper->courses->name}}</td>
                                @else
                                    <td>Not Assign</td>
                                @endif
                                <td>{{$paper->topic}}</td>
                                <td>{{$paper->description}}</td>

                                <td>{{$paper->unique_id}}</td>


                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="{{ route('onlinepaper.show', Qs::hash($paper->id)) }}"
                                                   class="dropdown-item"><i class="icon-plus-circle2"></i> Add Question</a>
                                                <a href="{{ route('teacher.paper.edit', Qs::hash($paper->id)) }}"
                                                   class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                <a id="{{ $paper->id }}" onclick="confirmDelete(this.id)" href="#"
                                                   class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ $paper->id }}"
                                                      action="{{ route('teacher.paper.destroy', Qs::hash($paper->id)) }}"
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
