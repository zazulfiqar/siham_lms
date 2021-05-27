@extends('layouts.master')
@section('page_title', 'Manage Web Courses')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Web Courses</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-section" class="nav-link active" data-toggle="tab">Create New Course
                        List</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Manage Subjects Detail</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach($subjects as $s)
                            <a href="#c{{ $s->id }}" class="dropdown-item" data-toggle="tab">{{ $s->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show  active fade" id="new-section">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="" method="post" action="{{ route('frontcourse.store') }}">
                                @csrf


                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Select
                                        Subject <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select required data-placeholder="Select Class" class="form-control select"
                                                name="course_id" id="my_class_id">
                                            @foreach($subjects as $c)
                                                <option
                                                    {{ old('my_class_id') == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Course Content <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input name="content" value="{{ old('name') }}" required type="text"
                                               class="form-control" placeholder="Content title">
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

                @foreach($subjects as $d)
                    <div class="tab-pane fade" id="c{{ $d->id }}">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Class</th>
{{--                                <th>Teacher</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>


                            {{--                            @foreach($front_courses->where('course_id.id', $d->id) as $s)--}}

                            @foreach($front_courses->where('course_id','=',$d->id) as $s)
                                {{--->where('course_id','=','6')--}}
                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->name }} @if($s->active)<i class='icon-check'> </i>@endif</td>
                                    <td>{{ $s->content }}</td>

{{--                                    @if($s->teacher_id)--}}
{{--                                        <td><a target="_blank"--}}
{{--                                               href="{{ route('users.show', Qs::hash($s->teacher_id)) }}">{{ $s->teacher->name }}</a>--}}
{{--                                        </td>--}}
{{--                                    @else--}}
{{--                                        <td> -</td>--}}
{{--                                    @endif--}}

                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">

                                                    @if(Qs::userIsTeamSA())
                                                         <a href="{{ route('frontcourse.edit', $s->id) }}"
                                                           class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                           <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"
                                                            class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                         <form method="post" id="item-delete-{{ $s->id }}"
                                                               action="{{ route('frontcourse.destroy', $s->id) }}"
                                                               class="hidden">@csrf @method('delete')</form>
                                                    @endif

                                                    <!--@if(Qs::userIsSuperAdmin())-->
                                                    <!--    <a id="{{ $s->id }}" onclick="confirmDelete(this.id)" href="#"-->
                                                    <!--       class="dropdown-item"><i class="icon-trash"></i> Delete</a>-->
                                                    <!--    <form method="post" id="item-delete-{{ $s->id }}"-->
                                                    <!--          action="{{ route('frontcourse.destroy', $s->id) }}"-->
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
                @endforeach

            </div>
        </div>
    </div>

    {{--Section List Ends--}}

@endsection
