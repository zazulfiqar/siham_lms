@extends('layouts.master')
@section('page_title', 'Class Schedule')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
{{--            <h6 class="card-title">Current Semester</h6>--}}
            {!! Qs::getPanelOptions() !!}
        </div>

                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course</th>
                            {{-- <th>Teacher</th> --}}
                            <th>Time</th>
                            <th>Zoom Link</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($schedule as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if(isset($s->course_id))

                                    <td>

                                        @php
                                        $papersData  = \App\Models\Courses::where('id',$s->course_id)->first();

                                      @endphp
                                        {{ $papersData->name }}

                                    </td>
                                @else
                                    <td>No Course </td>
                                @endif

                                {{-- @if(isset($s->teachers->name) )
                                    <td>{{ $s->teachers->name }} </td>
                                @else
                                    <td>teacher not assign</td>

                                @endif --}}

                                <td>{{ $s->time }} </td>

                                <td><a target="_blank" href="{{ $s->zoom_link }}">{{ $s->zoom_link }} </a></td>

                                {{-- <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">

                                                <a href="{{ route('teacher.scheduleAClass.edit', Qs::hash($s->id)) }}"
                                                   class="dropdown-item"><i class="icon-pencil"></i> Edit</a>

                                                <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"
                                                   class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ $s->id }}"
                                                      action="{{ route('teacher.scheduleAClass.destroy', Qs::hash($s->id)) }}"
                                                      class="hidden">@csrf @method('post')</form>

                                            </div>
                                        </div>
                                    </div>
                                </td> --}}
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

                            {{--                                <span>When a class is created, a Section will be automatically created for the class, you can edit it or add more sections to the class at <a target="_blank" href="{{ route('sections.index') }}">Student Sections</a></span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{--                            <form class="ajax-store" method="post" action="{{ route('policies.store') }}">--}}

                            <form class="" method="post" action="{{ route('policies.store') }}">
@method('post');
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
